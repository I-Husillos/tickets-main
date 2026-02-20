<?php

namespace App\Notifications;

use App\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketCreatedNotification extends Notification
{
    use Queueable;

    protected $ticket;

    public function __construct($ticket, string $locale = 'es')
    {
        $this->ticket = $ticket;
        $this->locale = $locale;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $ticketUrl = NotificationService::ticketUrl('admin', $this->ticket->id, $this->locale);
        $userName  = $this->ticket->user?->name ?? 'Usuario desconocido';

        return (new MailMessage)
            ->subject(__('notifications.ticket_created', [], $this->locale))
            ->line(__('notifications.content_created', [
                'user'  => $userName,
                'title' => $this->ticket->title,
            ], $this->locale))
            ->action(__('notifications.view_ticket', [], $this->locale), $ticketUrl);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type'          => 'created',
            'ticket_id'     => $this->ticket->id,
            'title'         => $this->ticket->title,
            'description'   => $this->ticket->description,
            'created_by'    => $this->ticket->user->name,
            'author'        => $this->ticket->user->name,
            'author_name'   => $this->ticket->user->name,
            'created_by_id' => $this->ticket->user->id,
            'priority'      => $this->ticket->priority,
            'status'        => $this->ticket->status,
        ];
    }
}