<?php

namespace App\Services\TicketsService;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignedTicketQueryService
{
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

        if ($request->has('order')) {
            $order = $request->input('order');
            if (isset($order[0])) {
                $columnIdx = $order[0]['column'];
                $dir = $order[0]['dir'];
                $columnName = $request->input("columns.$columnIdx.data");

                if (in_array($columnName, ['id', 'title', 'status', 'priority', 'type'])) {
                    $query->orderBy($columnName, $dir);
                } else {
                    $query->orderBy('created_at', 'desc');
                }
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query;
    }
}

