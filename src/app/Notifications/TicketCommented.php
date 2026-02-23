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
    protected string $notifLocale;
    protected string $notifGuard;

    /**
     * @param mixed  $ticket
     * @param mixed  $comment
     * @param string $locale  Idioma del email ('es'|'en')
     * @param string $guard   Destinatario: 'user' o 'admin'
     */
    public function __construct($ticket, $comment, string $locale = 'es', string $guard = 'user')
    {
        $this->ticket      = $ticket;
        $this->comment     = $comment;
        $this->notifLocale = $locale;
        $this->notifGuard  = $guard;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $ticketUrl = NotificationService::ticketUrl($this->notifGuard, $this->ticket->id, $this->notifLocale);

        return (new MailMessage)
            ->subject(__('notifications.ticket_commented', [], $this->notifLocale))
            ->line(__('notifications.content_commented', [
                'author' => $this->comment->author->name,
                'title'  => $this->ticket->title,
            ], $this->notifLocale))
            ->action(__('notifications.view_ticket', [], $this->notifLocale), $ticketUrl);
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