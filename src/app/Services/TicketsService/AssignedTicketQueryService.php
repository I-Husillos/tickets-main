<?php

namespace App\Services\TicketsService;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\DataTables\BaseQueryService;

class AssignedTicketQueryService extends BaseQueryService
{
    protected function getSortableFields(): array
    {
        return [
            'id' => 'id',
            'title' => 'title',
            'status' => 'status',
            'priority' => 'priority',
            'type' => 'type',
        ];
    }

    public function totalForAdmin(int $adminId): int
    {
        return Ticket::where('admin_id', $adminId)->count();
    }

    public function buildQueryForAdmin(Request $request, int $adminId)
    {
        $query = Ticket::with(['type', 'admin', 'comments'])
                       ->where('admin_id', $adminId);

        $search = $request->input('search.value');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('status', 'LIKE', "%$search%")
                  ->orWhere('priority', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
            });
        }

        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }
}

