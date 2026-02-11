<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Admin;
use App\Models\Type;
use App\Jobs\SendNotifications;
use App\Models\EventHistory;
use App\Http\Requests\UpdateTicketStatusRequest;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Auth;

class AdminTicketController extends Controller
{
    public function viewTicket(String $locale, Ticket $ticket)
    {
        $admins = Admin::all();
        $ticketTypes = Type::all();

        return view('admin.tickets.viewtickets', compact('ticket', 'admins', 'ticketTypes'));
    }
    

    public function manageTickets(Request $request)
    {
        $query = Ticket::query();

        if($request->filled('status'))
        {
            $query->where('status',$request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $totalTickets = Ticket::count();
        $resolvedTickets = Ticket::where('status', 'resolved')->count();
        $pendingTickets = Ticket::where('status', 'pending')->count();

        $tickets = $query->paginate(5);

        return view('admin.tickets.managetickets', [
            'tickets' => $tickets,
            'totalTickets' => $totalTickets,
            'resolvedTickets' => $resolvedTickets,
            'pendingTickets' => $pendingTickets,
        ]);
    }



    public function filterTickets(Request $request)
    {
        $query = Ticket::query();

        if($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if($request->filled('priority')){
            $query->where('priority', $request->priority);
        }

        if($request->filled('type')){
            $query->where('type', $request->type);
        }

        $tickets = $query->get();
        return view('admin.managetickets', compact('tickets'));
    }



    public function updateTicketStatus(String $locale, UpdateTicketStatusRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        
        $validated = $request->validated();
        $oldStatus = $ticket->status;

        // Asignación del admin
        if (isset($validated['assigned_to'])) {
            $ticket->admin_id = $validated['assigned_to'];
        }

        // Verifica y crea tipo si no existe
        if (!empty($validated['type'])) {
            $typeName = $validated['type'];

            $existingType = \App\Models\Type::where('name', $typeName)->first();

            if (!$existingType) {
                \App\Models\Type::create(['name' => $typeName]);
            }

            $ticket->type = $typeName;
        }

        // Otras actualizaciones
        $newStatus = $validated['status'];
        $ticket->status = $newStatus;
        $ticket->priority = $validated['priority'] ?? $ticket->priority;

        if ($newStatus === 'resolved') {
            $ticket->resolved_at = now();
        } elseif (in_array($newStatus, ['new', 'pending'])) {
            $ticket->resolved_at = null;
        }

        $ticket->save();

        $admin = Auth::guard('admin')->user();

        // Notification Logic
        if ($newStatus === 'closed') {
            SendNotifications::dispatch($ticket->id, 'closed', $admin);
        } elseif (($oldStatus === 'closed' || $oldStatus === 'resolved') && ($newStatus === 'pending' || $newStatus === 'in_progress')) {
            SendNotifications::dispatch($ticket->id, 'reopened', $admin);
        } else {
            SendNotifications::dispatch($ticket->id, 'status_changed', $admin);
        }

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' ha sido actualizado',
            'user' => $admin->name,
        ]);

        if($admin->superadmin) {
            return redirect()->route('admin.manage.tickets', ['locale' => $locale])->with('success', 'Ticket actualizado correctamente.');
        }else{
            return redirect()->route('admin.show.assigned.tickets', ['locale' => $locale])->with('success', 'Ticket actualizado correctamente.');
        }
    }

    public function showAssignedTickets(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $query = Ticket::where('admin_id', $admin->id);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $totalTickets = $query->count();
        $resolvedTickets = $query->where('status', 'resolved')->count();
        $pendingTickets = $query->where('status', 'pending')->count();

        $assignedTickets = $query->paginate(5);

        return view('admin.tickets.assignedticketsview', [
            'assignedTickets' => $assignedTickets,
            'totalTickets' => $totalTickets,
            'resolvedTickets' => $resolvedTickets,
            'pendingTickets' => $pendingTickets
        ]);
    }


    public function getTicketsJson()
    {
        $tickets = Ticket::with('comments', 'admin')->get();

        $data = $tickets->map(function ($ticket) {
            return [
                'id' => $ticket->id,
                'title' => $ticket->title,
                'status' => ucfirst($ticket->status),
                'priority' => ucfirst($ticket->priority),
                'type' => ucfirst($ticket->type),
                'comments_count' => $ticket->comments->count(),
                'assigned_to' => $ticket->admin->name ?? __('general.admin_ticket_manage.sin_asignar'),
                'actions' => view('components.actions.ticket-actions', compact('ticket'))->render()
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function getAssignedTicketsAjax(Request $request)
    {
        $query = Ticket::with('comments')
            ->where('admin_id', auth('admin')->id());

        // Filtros opcionales
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }


        $tickets = $query->get();


        $data = $tickets->map(function ($ticket) {
            return [
                'id' => $ticket->id,
                'title' => $ticket->title,
                'description' => Str::limit($ticket->description, 50),
                'status' => view('components.badges.status', compact('ticket'))->render(),
                'priority' => view('components.badges.priority', compact('ticket'))->render(),
                'type' => ucfirst($ticket->type),
                'comments_count' => $ticket->comments->count(),
                'actions' => view('components.actions.ticket-actions', compact('ticket'))->render()
            ];
        });

        return response()->json(['data' => $data]);
    }

}


