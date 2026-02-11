<?php

namespace App\Services\TicketsService;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UserTicketQueryService
{
    public function filter(Request $request, Builder $query): Builder
    {
        // Solo tickets del usuario autenticado
        $query->where('user_id', Auth::id());

        
        if ($request->has('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('status', 'LIKE', "%$search%")
                  ->orWhere('priority', 'LIKE', "%$search%");
            });
        }
        
        if ($request->has('order')) {
            $order = $request->input('order');
            if (isset($order[0])) {
                $columnIdx = $order[0]['column'];
                $dir = $order[0]['dir'];
                $columnName = $request->input("columns.$columnIdx.data");

                if (in_array($columnName, ['id', 'title', 'status', 'priority'])) {
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
