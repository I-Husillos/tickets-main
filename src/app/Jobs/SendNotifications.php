<?php

namespace App\Jobs;

use App\Models\Ticket;
use App\Models\Admin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Notifications\TicketCreatedNotification;
use App\Notifications\TicketCreatedUserConfirmation;
use App\Notifications\TicketCommented;
use App\Notifications\TicketStatusChanged;
use App\Notifications\TicketClosed;
use App\Notifications\TicketReopened;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;




use Illuminate\Queue\SerializesModels;

class SendNotifications implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $ticket;
    protected $type;
    protected $comment;
    protected $actor;
    protected mixed $extraData;
    protected string $locale;

    /**
     * Create a new job instance.
     */
    public function __construct($ticketId, string $type, $extraData = null, string $locale = 'es')
    {
        $this->ticket = $ticketId;
        $this->type = $type;
        $this->extraData = $extraData;
        $this->locale = $locale;

        if ($type === 'commented' || $type === 'user_commented') {
            $this->comment = $extraData;
        }

        // Para status_changed, closed y reopened, extraData es el actor (admin)
        if (in_array($type, ['status_changed', 'closed', 'reopened'])) {
            $this->actor = $extraData;
        }
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        App::setLocale($this->locale);

        $ticket = $this->ticket instanceof Ticket ? $this->ticket->load(['user', 'admin']): Ticket::with(['user', 'admin'])->find($this->ticket);


        $admin = is_int($this->actor) ? Admin::find($this->actor) : $this->actor;

        if (!$ticket) {
            Log::warning("Ticket no encontrado: {$this->ticket}");
            return;
        }


        switch ($this->type) {
            case 'created':

                // Notificar solo a superadmins
                $admins = Admin::where('superadmin', 1)->get();
            
                // Si no hay superadmins, notificar a todos los admins
                if ($admins->isEmpty()) {
                    Log::warning("No hay superadmins. Notificando a todos los administradores.");
                    $admins = Admin::all();
                }
            
                foreach ($admins as $admin) {
                    $admin->notify(new TicketCreatedNotification($ticket, $this->locale));
                }

                // Enviar email de confirmación al usuario que creó el ticket
                if ($ticket->user) {
                    $ticket->user->notify(new TicketCreatedUserConfirmation($ticket, $this->locale));
                }
                break;

            case 'commented':
                if ($ticket->user) {
                    $ticket->user->notify(new TicketCommented($ticket, $this->comment, $this->locale));
                }
                break;

            case 'user_commented':
                if ($ticket->admin) {
                    $ticket->admin->notify(new TicketCommented($ticket, $this->extraData, $this->locale));
                } else {
                    $admins = Admin::all(); // o filtra los superadmins
                    foreach ($admins as $admin) {
                        $admin->notify(new TicketCommented($ticket, $this->extraData, $this->locale));
                    }
                }
                break;

            case 'status_changed':
                // Verificar si el usuario está relacionado con el ticket antes de notificar
                if ($ticket->user) {
                    // Usar $this->actor en lugar de $this->extraData para consistencia
                    $actor = $this->actor instanceof Admin ? $this->actor : Admin::find($this->actor);
                    // Si falla al resolver el actor, intentar usar extraData si es un modelo
                    if (!$actor && $this->extraData instanceof Admin) {
                        $actor = $this->extraData;
                    }
                    
                    if ($actor) {
                        $ticket->user->notify(new TicketStatusChanged($ticket, $actor, $this->locale));
                    }
                } else {
                    Log::warning("No admin found for ticket: {$ticket->id}. Notifying all admins.");
                    // Si no hay admin asociado, notificar a todos los administradores
                    $admins = Admin::all();
                    foreach ($admins as $admin) {
                        // Usar $this->actor o una instancia válida
                        $actor = $this->actor instanceof Admin ? $this->actor : $admin; 
                        $admin->notify(new TicketStatusChanged($ticket, $actor, $this->locale));
                    }
                }
                break;
            
                case 'closed':
                    if ($ticket->user && $this->extraData instanceof Admin) {
                        $ticket->user->notify(new TicketClosed($ticket, $this->extraData, $this->locale));
                    } else {
                        Log::warning("No admin found or actor is not Admin for ticket: {$ticket->id}. Notifying all admins.");
                        $admins = Admin::all();
                        foreach ($admins as $admin) {
                            $admin->notify(new TicketClosed($ticket, $admin, $this->locale));
                        }
                    }
                    break;

                case 'reopened':
                    if ($ticket->user && $this->extraData instanceof Admin) {
                        $ticket->user->notify(new TicketReopened($ticket, $this->extraData, $this->locale));
                    } else {
                        Log::warning("No admin found or actor is not Admin for ticket: {$ticket->id}. Notifying all admins.");
                        $admins = Admin::all();
                        foreach ($admins as $admin) {
                            $admin->notify(new TicketReopened($ticket, $admin, $this->locale));
                        }
                    }
                    break;
        
            default:
                Log::warning("Tipo de notificación desconocido: {$this->type}");
                break;
        }
    }
}

// php artisan queue:work redis