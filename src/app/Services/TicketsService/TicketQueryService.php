<?php

namespace App\Services\TicketsService;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\DataTables\BaseQueryService;

class TicketQueryService extends BaseQueryService
{
    public function total(): int
    {
        return Ticket::count();
    }

    protected function getSortableFields(): array
    {
        return [
            'id' => 'id',
            'title' => 'title',
            'status' => 'status',
            'priority' => 'priority',
            'type' => 'type',
            'comments' => 'comments_count',
            'assigned_to' => [
                'join' => ['admins', 'tickets.admin_id', '=', 'admins.id'],
                'field' => 'admins.name'
            ],
        ];
    }

    public function buildQuery(Request $request)
    {
        $query = Ticket::select('tickets.*')
            ->with(['type', 'admin', 'comments'])
            ->withCount('comments');

        // Filtros específicos
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->input('priority'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        // Búsqueda de texto
        $search = $request->input('search.value');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
            });
        }

        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }
}
