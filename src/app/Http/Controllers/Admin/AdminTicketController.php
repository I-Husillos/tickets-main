<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Admin;
use App\Models\Type;
use App\Models\Tag;
use App\Models\Project;
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
        $admin = Auth::guard('admin')->user();
        $projects = $admin->superadmin
            ? Project::all()
            : Project::where('admin_id', $admin->id)->get();
        $allTags  = Tag::orderBy('name')->get();

        return view('admin.tickets.viewtickets', compact('ticket', 'admins', 'ticketTypes', 'projects', 'allTags'));
    }
    

    private const KANBAN_STATUSES = ['new', 'in_progress', 'pending', 'resolved', 'closed'];

    private const KANBAN_STATUS_COLORS = [
        'new'         => 'primary',
        'in_progress' => 'warning',
        'pending'     => 'secondary',
        'resolved'    => 'success',
        'closed'      => 'danger',
    ];

    private const KANBAN_PRIORITY_COLORS = [
        'low'      => 'success',
        'medium'   => 'info',
        'high'     => 'warning',
        'critical' => 'danger',
    ];

    public function manageTickets(Request $request)
    {
        $totalTickets    = Ticket::count();
        $resolvedTickets = Ticket::where('status', 'resolved')->count();
        $types           = Type::all();

        $admin = Auth::guard('admin')->user();
        $query = Ticket::with(['user', 'admin', 'tags', 'project']);

        if (!$admin->superadmin) {
            $query->where(function ($q) use ($admin) {
                $q->where('admin_id', $admin->id)
                  ->orWhere('created_by_admin_id', $admin->id);
            });
        }

        $kanbanTickets   = $query->get()->groupBy('status');
        $statuses        = self::KANBAN_STATUSES;
        $statusColors    = self::KANBAN_STATUS_COLORS;
        $priorityColors  = self::KANBAN_PRIORITY_COLORS;

        return view('admin.tickets.managetickets', compact(
            'totalTickets',
            'resolvedTickets',
            'types',
            'kanbanTickets',
            'statuses',
            'statusColors',
            'priorityColors'
        ));
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

            $existingType = Type::where('name', $typeName)->first();

            if (!$existingType) {
                Type::create(['name' => $typeName]);
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

        // Sync tags (ids or new names)
        $this->syncTags($ticket, $request->tags ?? []);

        $admin = Auth::guard('admin')->user();

        // Notification Logic
        if ($newStatus === 'closed') {
            SendNotifications::dispatch($ticket->id, 'closed', $admin, app()->getLocale());
        } elseif (($oldStatus === 'closed' || $oldStatus === 'resolved') && ($newStatus === 'pending' || $newStatus === 'in_progress')) {
            SendNotifications::dispatch($ticket->id, 'reopened', $admin, app()->getLocale());
        } else {
            SendNotifications::dispatch($ticket->id, 'status_changed', $admin, app()->getLocale());
        }

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' ha sido actualizado',
            'user' => $admin->name,
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'ticket_id' => $ticket->id,
                'status' => $ticket->status,
            ]);
        }

        if($admin->superadmin) {
            return redirect()->route('admin.manage.tickets', ['locale' => $locale])->with('success', 'Ticket actualizado correctamente.');
        }else{
            return redirect()->route('admin.show.assigned.tickets', ['locale' => $locale])->with('success', 'Ticket actualizado correctamente.');
        }
    }

    public function showAssignedTickets(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $totalTickets = Ticket::where('admin_id', $admin->id)->count();
        $resolvedTickets = Ticket::where('admin_id', $admin->id)->where('status', 'resolved')->count();
        $types = Type::all();

        return view('admin.tickets.assignedticketsview', [
            'totalTickets' => $totalTickets,
            'resolvedTickets' => $resolvedTickets,
            'types' => $types,
        ]);
    }


    /**
     * Show form to create a ticket owned by the admin (agenda interna).
     */
    public function createAdminTicket()
    {
        $types    = Type::all();
        $projects = Project::where('admin_id', auth('admin')->id())->get();
        $allTags  = Tag::orderBy('name')->get();

        return view('admin.tickets.create-admin', compact('types', 'projects', 'allTags'));
    }

    /**
     * Store an admin-owned ticket.
     */
    public function storeAdminTicket(Request $request)
    {
        $locale = app()->getLocale();
        $admin  = Auth::guard('admin')->user();

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'priority'    => 'required|in:low,medium,high,critical',
            'status'      => 'required|in:new,in_progress,pending,resolved,closed',
            'type'        => 'nullable|string|max:100',
            'project_id'  => 'nullable|exists:projects,id',
        ]);

        $ticket = Ticket::create([
            'title'               => $validated['title'],
            'description'         => $validated['description'],
            'priority'            => $validated['priority'],
            'status'              => $validated['status'],
            'type'                => $validated['type'] ?? 'request',
            'project_id'          => $validated['project_id'] ?? null,
            'created_by_admin_id' => $admin->id,
            'is_admin_ticket'     => true,
            'user_id'             => null,
        ]);

        $this->syncTags($ticket, $request->tags ?? []);

        EventHistory::create([
            'event_type'  => 'Creación',
            'description' => 'El admin ' . $admin->name . ' creó el ticket de agenda #' . $ticket->id . ': ' . $ticket->title,
            'user'        => $admin->name,
        ]);

        return redirect()->route('admin.my.tickets', ['locale' => $locale])
            ->with('success', __('general.admin_own_tickets.created'));
    }

    /**
     * List own (agenda) tickets for the current admin.
     */
    public function myTickets()
    {
        $admin   = Auth::guard('admin')->user();
        $tickets = Ticket::with(['project', 'tags'])
            ->where('created_by_admin_id', $admin->id)
            ->orderByDesc('created_at')
            ->get();

        return view('admin.tickets.my-tickets', compact('tickets'));
    }

    /**
     * Sync tags: accepts numeric IDs (existing) or strings (create on the fly).
     */
    private function syncTags(Ticket $ticket, array $tagInputs): void
    {
        $tagIds = [];
        foreach ($tagInputs as $input) {
            if (is_numeric($input)) {
                $tagIds[] = (int) $input;
            } else {
                $trimmed = trim($input);
                if ($trimmed !== '') {
                    $tag = Tag::firstOrCreate(['name' => $trimmed]);
                    $tagIds[] = $tag->id;
                }
            }
        }
        $ticket->tags()->sync($tagIds);
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


