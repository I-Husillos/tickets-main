<?php

namespace App\Support\Kanban;

/**
 * Single source of truth for all Kanban-related constants.
 * Previously duplicated across AdminTicketController and TicketDataController.
 */
final class KanbanConfig
{
    public const STATUSES = ['new', 'in_progress', 'pending', 'resolved', 'closed'];

    public const STATUS_COLORS = [
        'new'         => 'primary',
        'in_progress' => 'warning',
        'pending'     => 'secondary',
        'resolved'    => 'success',
        'closed'      => 'danger',
    ];

    // Note: priority colours are intentionally absent.
    // They are handled client-side by PRIORITY_CLASSES in kanban-loader.js.

    private function __construct() {}
}