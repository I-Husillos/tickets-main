<?php
namespace App\Notifications;

use App\Models\Ticket;
use App\Models\Admin;
use App\Services\NotificationService;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TicketReopened extends Notification
{
    protected $ticket;
    protected $admin;

    public function __construct(Ticket $ticket, Admin $admin)
    {
        $this->ticket = $ticket;
        $this->admin = $admin;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Elige los canales que quieres usar
    }

    public function toMail($notifiable): MailMessage
    {
        $locale = $notifiable->locale ?? config('app.locale');

        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $locale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_reopened', [], $locale))
            ->line(__('notifications.content_reopened', [
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
    public function toArray($notifiable): array
    {
        return [
            'type' => 'reopened',
            'ticket_id' => $this->ticket->id,
            'title' => $this->ticket->title,
            'created_by' => $this->admin->name,
            'reopened_by' => $this->admin->name,
        ];
    }
}
