<?php

namespace App\Services\TicketsService;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketQueryService
{
    public function total(): int
    {
        return Ticket::count();
    }

    public function buildQuery(Request $request)
    {
        $query = Ticket::select('tickets.*')
            ->with(['type', 'admin', 'comments'])
            ->withCount('comments');

        $search = $request->input('search.value');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('status', 'LIKE', "%$search%")
                  ->orWhere('priority', 'LIKE', "%$search%")
                  ->orWhere('type', 'LIKE', "%$search%");
            });
        }

        if ($request->has('order')) {
            $order = $request->input('order');
            if (isset($order[0])) {
                $columnIdx = $order[0]['column'];
                $dir = $order[0]['dir'];
                $columnName = $request->input("columns.$columnIdx.data");

                switch ($columnName) {
                    case 'id':
                    case 'title':
                    case 'status':
                    case 'priority':
                    case 'type':
                        $query->orderBy($columnName, $dir);
                        break;
                    case 'comments':
                        $query->orderBy('comments_count', $dir);
                        break;
                    case 'assigned_to':
                        $query->leftJoin('admins', 'tickets.admin_id', '=', 'admins.id')
                              ->orderBy('admins.name', $dir);
                        break;
                    default:
                        $query->orderBy('created_at', 'desc');
                        break;
                }
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query;
    }
}
