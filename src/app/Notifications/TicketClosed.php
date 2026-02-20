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

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket, Admin $admin)
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
        $locale = $notifiable->locale ?? config('app.locale');

        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $locale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_closed', [], $locale))
            ->line(__('notifications.content_closed', [
                'admin' => $this->admin->name,
                'title' => $this->ticket->title,
            ], $locale))
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
            'type' => 'closed',
            'ticket_id' => $this->ticket->id,
            'title' => $this->ticket->title,
            'created_by' => $this->admin->name,
            'closed_by' => $this->admin->name,
            'author' => $this->admin->name
        ];
    }

}
