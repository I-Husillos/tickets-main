<?php

namespace App\Services\Events;

use App\Models\EventHistory;

class EventHistoryDataActions
{
    public function transform(EventHistory $event, string $locale): array
    {
        return [
            'event_type' => __($event->event_type),
            'description' => $event->description,
            'user' => $event->user,
            'date' => $event->created_at->format('d/m/Y H:i'),
        ];
    }
}



