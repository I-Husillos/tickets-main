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

    /**
     * Create a new notification instance.
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database']; // Define los canales por los cuales se enviará la notificación (por correo electronico y ara almacenar la notificación en la base de datos)
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $locale = $notifiable->locale ?? config('app.locale');

        // Construir URL igual que TicketDataActions
        $path = trans('routes.admin.view.ticket', [], $locale);
        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $locale);

        $userName = $this->ticket->user?->name ?? 'Usuario desconocido';

        return (new MailMessage)
            ->subject(__('notifications.ticket_created', [], $locale))
            ->line(__('notifications.content_created', [
                'user' => $userName,
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
            'type'        => 'created',
            'ticket_id'   => $this->ticket->id,
            'title'       => $this->ticket->title,
            'description' => $this->ticket->description,
            'created_by'  => $this->ticket->user->name,
            'author'      => $this->ticket->user->name,
            'author_name' => $this->ticket->user->name,
            'created_by_id' => $this->ticket->user->id,
            'priority'    => $this->ticket->priority,
            'status'      => $this->ticket->status,
        ];
    }
}
