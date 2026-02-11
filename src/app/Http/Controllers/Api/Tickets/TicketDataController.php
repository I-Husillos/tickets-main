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

}


