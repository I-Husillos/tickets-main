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

}

