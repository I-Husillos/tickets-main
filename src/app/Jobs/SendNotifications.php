<?php

namespace App\Jobs;

use App\Models\Ticket;
use App\Models\Admin;
use App\Services\NotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Notifications\TicketCreatedNotification;
use App\Notifications\TicketCreatedUserConfirmation;
use App\Notifications\TicketCommented;
use App\Notifications\TicketStatusChanged;
use App\Notifications\TicketClosed;
use App\Notifications\TicketReopened;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;

class SendNotifications implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $ticket;
    protected $type;
    protected mixed $extraData;
    protected string $locale;

    public function __construct($ticketId, string $type, $extraData = null, string $locale = 'es')
    {
        $this->ticket    = $ticketId;
        $this->type      = $type;
        $this->extraData = $extraData;
        $this->locale    = NotificationService::normalizeLocale($locale);
    }

    public function handle(): void
    {
        App::setLocale($this->locale);

        $ticket = $this->ticket instanceof Ticket
            ? $this->ticket->load(['user', 'admin'])
            : Ticket::with(['user', 'admin'])->find($this->ticket);

        if (!$ticket) {
            Log::warning("Ticket no encontrado: {$this->ticket}");
            return;
        }

        switch ($this->type) {

            case 'created':
                $admins = Admin::where('superadmin', 1)->get();
                if ($admins->isEmpty()) {
                    Log::warning("No hay superadmins. Notificando a todos los administradores.");
                    $admins = Admin::all();
                }
                foreach ($admins as $adm) {
                    $adm->notify(new TicketCreatedNotification($ticket, $this->locale, 'admin'));
                }
                if ($ticket->user) {
                    $ticket->user->notify(new TicketCreatedUserConfirmation($ticket, $this->locale, 'user'));
                }
                break;

            case 'commented':
                // Admin comentó → notificar al usuario
                if ($ticket->user) {
                    $ticket->user->notify(new TicketCommented($ticket, $this->extraData, $this->locale, 'user'));
                }
                break;

            case 'user_commented':
                // Usuario comentó → notificar al admin
                if ($ticket->admin) {
                    $ticket->admin->notify(new TicketCommented($ticket, $this->extraData, $this->locale, 'admin'));
                } else {
                    $admins = Admin::all();
                    foreach ($admins as $adm) {
                        $adm->notify(new TicketCommented($ticket, $this->extraData, $this->locale, 'admin'));
                    }
                }
                break;

            case 'status_changed':
                if ($ticket->user) {
                    $actor = $this->extraData instanceof Admin ? $this->extraData : Admin::find($this->extraData);
                    if ($actor) {
                        $ticket->user->notify(new TicketStatusChanged($ticket, $actor, $this->locale, 'user'));
                    }
                } else {
                    Log::warning("No user found for ticket: {$ticket->id}.");
                    $admins = Admin::all();
                    foreach ($admins as $adm) {
                        $actor = $this->extraData instanceof Admin ? $this->extraData : $adm;
                        $adm->notify(new TicketStatusChanged($ticket, $actor, $this->locale, 'admin'));
                    }
                }
                break;

            case 'closed':
                if ($ticket->user && $this->extraData instanceof Admin) {
                    $ticket->user->notify(new TicketClosed($ticket, $this->extraData, $this->locale, 'user'));
                } else {
                    Log::warning("No admin found for ticket closed: {$ticket->id}.");
                    $admins = Admin::all();
                    foreach ($admins as $adm) {
                        $adm->notify(new TicketClosed($ticket, $adm, $this->locale, 'admin'));
                    }
                }
                break;

            case 'reopened':
                if ($ticket->user && $this->extraData instanceof Admin) {
                    $ticket->user->notify(new TicketReopened($ticket, $this->extraData, $this->locale, 'user'));
                } else {
                    Log::warning("No admin found for ticket reopened: {$ticket->id}.");
                    $admins = Admin::all();
                    foreach ($admins as $adm) {
                        $adm->notify(new TicketReopened($ticket, $adm, $this->locale, 'admin'));
                    }
                }
                break;

            default:
                Log::warning("Tipo de notificación desconocido: {$this->type}");
                break;
        }
    }
}