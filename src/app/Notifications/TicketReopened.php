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

    public function __construct(Ticket $ticket, Admin $admin, string $locale = 'es')
    {
        $this->ticket = $ticket;
        $this->admin  = $admin;
        $this->locale = $locale;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $this->locale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_reopened', [], $this->locale))
            ->line(__('notifications.content_reopened', [
                'admin' => $this->admin->name,
                'title' => $this->ticket->title,
            ], $this->locale))
            ->action(__('notifications.view_ticket', [], $this->locale), $ticketUrl);
    }

    public function toArray($notifiable): array
    {
        return [
            'type'        => 'reopened',
            'ticket_id'   => $this->ticket->id,
            'title'       => $this->ticket->title,
            'created_by'  => $this->admin->name,
            'reopened_by' => $this->admin->name,
        ];
    }
}