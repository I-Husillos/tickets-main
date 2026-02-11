<?php

namespace App\Http\Controllers\Api\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Services\TicketsService\UserTicketQueryService;
use App\Services\TicketsService\UserTicketDataActions;

class UserTicketDataController extends Controller
{
    protected $queryService;
    protected $dataActions;

    public function __construct(UserTicketQueryService $queryService, UserTicketDataActions $dataActions)
    {
        $this->queryService = $queryService;
        $this->dataActions = $dataActions;
    }

    public function index(Request $request)
    {
        
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $query = $this->queryService->filter($request, Ticket::with('comments'));

        $total = Ticket::where('user_id', auth()->id())->count();
        $filtered = $query->count();

        $tickets = $query->skip($request->input('start', 0))
                         ->take($request->input('length', 10))
                         ->get();

        $data = $tickets->map(fn($ticket) => $this->dataActions->transform($ticket, $locale));

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }
}
