<?php

namespace App\Notifications;

use App\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketCommented extends Notification
{
    use Queueable;

    protected $ticket;
    protected $comment;

    public function __construct($ticket, $comment)
    {
        $this->ticket  = $ticket;
        $this->comment = $comment;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $locale    = $notifiable->locale ?? config('app.locale');
        $ticketUrl = NotificationService::ticketUrl('user', $this->ticket->id, $locale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_commented'))
            ->line(__('notifications.content_commented', [
                'author' => $this->comment->author->name,
                'title'  => $this->ticket->title,
            ]))
            ->action(__('notifications.view_ticket'), $ticketUrl);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type'         => 'comment',
            'ticket_id'    => $this->ticket->id,
            'ticket_title' => $this->ticket->title,
            'comment'      => $this->comment->message,
            'author'       => $this->comment->author->name,
        ];
    }
}