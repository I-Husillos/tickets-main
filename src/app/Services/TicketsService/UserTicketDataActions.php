<?php


namespace App\Services\TicketsService;

use Illuminate\Support\Facades\View;
use App\Models\Ticket;

class UserTicketDataActions
{
    public function transform(Ticket $ticket, string $locale): array
    {
        // Rutas traducidas del usuario
        $showUrl = url("/$locale/" . trans('routes.user.tickets.show', [], $locale));
        $showUrl = str_replace('{ticket}', $ticket->id, $showUrl);
        $showUrl .= '?username=' . $ticket->user_id;

        $editUrl = url("/$locale/" . trans('routes.user.tickets.edit', [], $locale));
        $editUrl = str_replace('{ticket}', $ticket->id, $editUrl);
        $editUrl .= '?username=' . $ticket->user_id;

        return [
            'title' => $ticket->title,
            'status' => ucfirst($ticket->status),
            'priority' => ucfirst($ticket->priority),
            'comments' => $ticket->comments()->count(),
            'date' => $ticket->created_at->format('d/m/Y'),
            'actions' => View::make('components.actions.user-ticket-actions', [
                'ticket' => $ticket,
                'showUrl' => $showUrl,
                'editUrl' => $editUrl,
            ])->render(),
        ];
    }
}
