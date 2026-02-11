<?php

namespace App\Services\TicketsService;

use App\Models\Ticket;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


class TicketDataActions
{
    public function transform(Ticket $ticket, string $locale): array
    {
        $viewUrl = url("/$locale/" . trans('routes.admin.view.ticket', [], $locale));
        $viewUrl = str_replace('{ticket}', $ticket->id, $viewUrl);

        $closeUrl = url("/$locale/" . trans('routes.admin.tickets.close', [], $locale));
        $closeUrl = str_replace('{ticket}', $ticket->id, $closeUrl);

        $reopenUrl = url("/$locale/" . trans('routes.admin.tickets.reopen', [], $locale));
        $reopenUrl = str_replace('{ticket}', $ticket->id, $reopenUrl);

        $actionsView = View::make('components.actions.ticket-actions', [
            'ticket' => $ticket,
            'viewUrl' => $viewUrl,
            'closeUrl' => $closeUrl,
            'reopenUrl' => $reopenUrl,
        ])->render();

        return [
            'id' => $ticket->id,
            'title' => $ticket->title,
            'description' => Str::limit($ticket->description, 100),
            'status' => ucfirst($ticket->status),
            'priority' => ucfirst($ticket->priority),
            'type' => ucfirst($ticket->type),
            'comments' => $ticket->comments->count(),
            'assigned_to' => $ticket->admin?->name ?? __('general.admin_ticket_manage.unassigned'),
            'actions' => $actionsView,
        ];
    }
}

