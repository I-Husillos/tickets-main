<?php

namespace App\Notifications;

use App\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketStatusChanged extends Notification
{
    use Queueable;

    protected $ticket;
    protected $admin;

    public function __construct($ticket, $admin, string $locale = 'es')
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
            ->subject(__('notifications.ticket_status_changed', [], $this->locale))
            ->line(__('notifications.content_status_changed', [
                'admin'  => $this->admin->name,
                'title'  => $this->ticket->title,
                'status' => $this->ticket->status,
            ], $this->locale))
            ->action(__('notifications.view_ticket', [], $this->locale), $ticketUrl);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type'       => 'status',
            'ticket_id'  => $this->ticket->id,
            'title'      => $this->ticket->title,
            'priority'   => $this->ticket->priority,
            'status'     => $this->ticket->status,
            'updated_by' => $this->admin,
        ];
    }
}