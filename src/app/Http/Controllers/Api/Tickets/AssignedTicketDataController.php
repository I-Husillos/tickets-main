<?php

namespace App\Http\Controllers\Api\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\TicketsService\AssignedTicketQueryService;
use App\Services\TicketsService\TicketDataActions;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class AssignedTicketDataController extends Controller
{
    protected $queryService;
    protected $dataActions;

    public function __construct(AssignedTicketQueryService $queryService, TicketDataActions $dataActions)
    {
        $this->queryService = $queryService;
        $this->dataActions = $dataActions;
    }

    public function indexAssignedTickets(Request $request)
    {
        $admin = auth('api')->user();

        if (!$admin) {
            Log::warning('Token inválido o expirado al acceder a tickets asignados.');
            return response()->json(['error' => 'Token inválido'], 401);
        }

        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $query = $this->queryService->buildQueryForAdmin($request, $admin->id);
        $total = $this->queryService->totalForAdmin($admin->id);
        $filtered = $query->count();

        $tickets = $query
            ->skip($request->input('start', 0))
            ->take($request->input('length', 10))
            ->get();

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
}

