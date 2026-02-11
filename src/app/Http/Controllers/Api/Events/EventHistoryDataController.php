<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Services\Events\EventHistoryDataActions;
use Illuminate\Http\Request;
use App\Models\EventHistory;


class EventHistoryDataController extends Controller
{
    protected $eventHistoryDataActions;

    public function __construct(EventHistoryDataActions $eventHistoryDataActions)
    {
        $this->eventHistoryDataActions = $eventHistoryDataActions;
    }


    public function indexEventHistory(Request $request)
    {
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        app()->setLocale($locale);

        $query = EventHistory::with('user')->latest();

        $total = $query->count();

        // Filtros de búsqueda de DataTables
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('event_type', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $filtered = $query->count();

        // Orden y paginación
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $query->skip($start)->take($length);


        $events = $query->get();

        $data = $events->map(fn ($event) => $this->eventHistoryDataActions->transform($event, $locale));

        return response()->json([
            'data' => $data,
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
        ]);
    }

}


