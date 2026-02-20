<?php

namespace App\Notifications;

use App\Models\Admin;
use App\Models\Ticket;
use App\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketClosed extends Notification
{
    use Queueable;

    protected $ticket;
    protected $admin;

    public function __construct(Ticket $ticket, Admin $admin, string $locale = 'es')
    {
        $this->ticket = $ticket;
        $this->admin  = $admin;
        $this->locale = $locale;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $this->locale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_closed', [], $this->locale))
            ->line(__('notifications.content_closed', [
                'admin' => $this->admin->name,
                'title' => $this->ticket->title,
            ], $this->locale))
            ->action(__('notifications.view_ticket', [], $this->locale), $ticketUrl);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type'       => 'closed',
            'ticket_id'  => $this->ticket->id,
            'title'      => $this->ticket->title,
            'created_by' => $this->admin->name,
            'closed_by'  => $this->admin->name,
            'author'     => $this->admin->name,
        ];
    }
}