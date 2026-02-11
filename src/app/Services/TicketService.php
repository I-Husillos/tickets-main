<?php
namespace App\Services;

use App\Models\Ticket;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendNotifications;

class TicketService
{
    public function createTicket(array $validated): Ticket
    {
        $validated['user_id'] = Auth::guard('user')->id();
        $ticket = Ticket::create($validated);

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'Ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" creado por ' . Auth::guard('user')->user()->email,
            'user' => Auth::guard('user')->user()->name,
        ]);

        SendNotifications::dispatch($ticket->id, 'created');
        return $ticket;
    }

    public function updateStatus(Ticket $ticket, string $newStatus, $actor, ?string $description = null)
    {
        $oldStatus = $ticket->status;
        $updateData = ['status' => $newStatus];

        if ($newStatus === 'resolved') {
            $updateData['resolved_at'] = now();
        } elseif (in_array($newStatus, ['new', 'pending'])) {
            $updateData['resolved_at'] = null;
        }

        $ticket->update($updateData);

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => $description ?? 'Ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" actualizado a "' . $newStatus . '"',
            'user' => $actor->name,
        ]);

        // Dispatch notification
        if ($newStatus === 'closed') {
            SendNotifications::dispatch($ticket->id, 'closed', $actor);
        } elseif (($oldStatus === 'closed' || $oldStatus === 'resolved') && ($newStatus === 'pending' || $newStatus === 'in_progress')) {
            SendNotifications::dispatch($ticket->id, 'reopened', $actor);
        } else {
            SendNotifications::dispatch($ticket->id, 'status_changed', $actor);
        }
    }
}

