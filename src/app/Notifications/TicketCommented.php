<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketCommented extends Notification
{
    use Queueable;

    protected $ticket;
    protected $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct($ticket, $comment)
    {
        $this->ticket = $ticket;
        $this->comment = $comment;
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
        return (new MailMessage)
            ->subject(__('notifications.ticket_commented'))
            ->line(__('notifications.content_commented', [
                'author' => $this->comment->author->name,
                'title' => $this->ticket->title,
            ]))
            ->action(__('notifications.view_ticket'), url('/user/tickets/' . $this->ticket->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'comment',
            'ticket_id' => $this->ticket->id,
            'ticket_title' => $this->ticket->title,
            'comment' => $this->comment->message,
            'author' => $this->comment->author->name,
        ];
    }
}

