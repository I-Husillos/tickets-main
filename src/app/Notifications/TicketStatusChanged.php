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

    /**
     * Create a new notification instance.
     */
    public function __construct($ticket, $admin)
    {
        $this->ticket = $ticket;
        $this->admin = $admin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $locale    = $notifiable->locale ?? app()->getLocale();
        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $locale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_status_changed'))
            ->line(__('notifications.content_status_changed', [
                'admin' => $this->admin->name,
                'title' => $this->ticket->title,
                'status' => $this->ticket->status,
            ]))
            ->action(__('notifications.view_ticket'), $ticketUrl);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'status',
            'ticket_id' => $this->ticket->id,
            'title' => $this->ticket->title,
            'priority' => $this->ticket->priority,
            'status' => $this->ticket->status,
            'updated_by' => $this->admin,
        ];
    }
}

