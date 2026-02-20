<?php

namespace App\Notifications;

use App\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketCreatedUserConfirmation extends Notification implements ShouldQueue
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
        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $this->locale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_created_confirmation_subject', ['id' => $this->ticket->id], $this->locale))
            ->greeting(__('notifications.ticket_created_confirmation_greeting', ['name' => $notifiable->name], $this->locale))
            ->line(__('notifications.ticket_created_confirmation_intro', [], $this->locale))
            ->line(__('notifications.ticket_created_confirmation_detail', [
                'id'    => $this->ticket->id,
                'title' => $this->ticket->title,
            ], $this->locale))
            ->line(__('notifications.ticket_created_confirmation_next', [], $this->locale))
            ->action(__('notifications.view_ticket', [], $this->locale), $ticketUrl)
            ->line(__('notifications.ticket_created_confirmation_thanks', [], $this->locale));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type'       => 'created',
            'ticket_id'  => $this->ticket->id,
            'title'      => $this->ticket->title,
            'created_by' => $this->ticket->user?->name ?? $notifiable->name,
        ];
    }
}