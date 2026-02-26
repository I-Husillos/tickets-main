<?php

namespace App\Http\Controllers\Api\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Services\TicketsService\TicketQueryService;
use App\Services\TicketsService\TicketDataActions;
use App\Services\TicketsService\UserTicketDataActions;
use App\Services\TicketsService\UserTicketQueryService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class TicketDataController extends Controller
{
    protected $queryService;
    protected $dataActions;
    protected $userActions;

    public function __construct(TicketQueryService $queryService, TicketDataActions $dataActions, UserTicketDataActions $userActions)
    {
        $this->queryService = $queryService;
        $this->dataActions = $dataActions;
        $this->userActions = $userActions;
    }

    public function indexTicketsAdmin(Request $request)
    {
        $admin = auth('api')->user();

        if (!$admin) {
            Log::warning('Token inválido o expirado.');
            return response()->json(['error' => 'Token inválido'], 401);
        }

        
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $query = $this->queryService->buildQuery($request);
        $total = $this->queryService->total();
        $filtered = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $tickets = $query->skip($start)->take($length)->get();

        $data = $tickets->map(function ($ticket) use ($locale) {
            return $this->dataActions->transform($ticket, $locale);
        });

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }


    public function indexTicketsUsers(Request $request)
    {
        $user = auth('api_user')->user();
        if (!$user) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'es';
        App::setLocale($locale);

        $query = Ticket::where('user_id', $user->id);

        $total = $query->count();

        $queryService = new UserTicketQueryService();
        $filteredQuery = $queryService->filter($request, $query);


        $filtered = $filteredQuery->count();

        

        $tickets = $filteredQuery->skip($request->input('start', 0))
                        ->take($request->input('length', 10))
                        ->get();

        $data = $tickets->map(fn($ticket) => $this->userActions->transform($ticket, $locale));

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function indexKanbanTicketsAdmin(Request $request)
    {
        $admin = auth('api')->user();

        if (!$admin) {
            Log::warning('Token inválido o expirado.');
            return response()->json(['error' => 'Token inválido'], 401);
        }

        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,pending,resolved,closed',
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        $status = $validated['status'];
        $perPage = (int) ($validated['per_page'] ?? 50);

        $query = Ticket::query()
            ->with([
                'project:id,name',
                'tags:id,name',
                'user:id,name',
                'createdByAdmin:id,name',
            ])
            ->where('status', $status)
            ->orderByDesc('updated_at')
            ->orderByDesc('id');

        if (!$admin->superadmin) {
            $query->where(function ($q) use ($admin) {
                $q->where('admin_id', $admin->id)
                  ->orWhere('created_by_admin_id', $admin->id);
            });
        }

        $tickets = $query->paginate($perPage);

        $data = $tickets->getCollection()->map(function (Ticket $ticket) use ($locale) {
            $viewUrl = url("/$locale/" . trans('routes.admin.view.ticket', [], $locale));
            $viewUrl = str_replace('{ticket}', $ticket->id, $viewUrl);

            return [
                'id' => $ticket->id,
                'title' => $ticket->title,
                'priority' => $ticket->priority,
                'status' => $ticket->status,
                'project' => $ticket->project?->name,
                'tags' => $ticket->tags->pluck('name')->values(),
                'user_name' => $ticket->user?->name,
                'created_by_admin_name' => $ticket->createdByAdmin?->name,
                'view_url' => $viewUrl,
            ];
        });

        return response()->json([
            'data' => $data,
            'meta' => [
                'status' => $status,
                'current_page' => $tickets->currentPage(),
                'last_page' => $tickets->lastPage(),
                'per_page' => $tickets->perPage(),
                'total' => $tickets->total(),
            ],
        ]);
    }

}


