<?php

namespace App\Services;

use App\Models\EventHistory;

class EventHistoryService
{
    public function filterEvents(array $filters)
    {
        $query = EventHistory::query();


        if (!empty($filters['event_type'])) {
            $query->where('event_type', 'like', '%' . $filters['event_type'] . '%');
        }

        if (!empty($filters['user'])) {
            $query->where('user', 'like', '%' . $filters['user'] . '%');
        }

        if (!empty($filters['date'])) {
            $query->whereDate('created_at', $filters['date']);
        }

        return $query->paginate(10);
    }

    public function store(array $data)
    {
        return EventHistory::create($data);
    }
}