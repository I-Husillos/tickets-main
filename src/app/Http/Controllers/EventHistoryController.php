<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventHistory;
use Illuminate\Container\Attributes\Auth;
use App\Services\EventHistoryService;
use App\Http\Requests\StoreEventHistoryRequest;;

class EventHistoryController
{
    protected $eventHistoryService;

    public function __construct(EventHistoryService $eventHistoryService)
    {
        $this->eventHistoryService = $eventHistoryService;
    }

    public function indexEventHistory(Request $request)
    {
        $filters = $request->only(['event_type', 'user', 'date']);
        $events = $this->eventHistoryService->filterEvents($filters);

        return view('admin.management.eventHistory.index', compact('events'));
    }


    public function storeHistory(StoreEventHistoryRequest $request)
    {
        $validated = $request->validated();

        $this->eventHistoryService->store($validated);

        return redirect()->route('admin.eventHistory.index');
    }


    public function getEventsAjax(Request $request)
    {
        $query = EventHistory::query();

        if ($request->filled('event_type')) {
            $query->where('event_type', 'like', '%' . $request->event_type . '%');
        }

        if ($request->filled('user')) {
            $query->where('user', 'like', '%' . $request->user . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $events = $query->latest()->get();

        $data = $events->map(function ($event) {
            return [
                'event_type' => $event->event_type,
                'description' => $event->description,
                'user' => $event->user,
                'created_at' => $event->created_at->format('d/m/Y H:i'),
            ];
        });

        return response()->json(['data' => $data]);
    }

}

