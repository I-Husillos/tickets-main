<?php

namespace App\Services\TicketsService;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Services\DataTables\BaseQueryService;

class UserTicketQueryService extends BaseQueryService
{
    protected function getSortableFields(): array
    {
        return [
            'id' => 'id',
            'title' => 'title',
            'status' => 'status',
            'priority' => 'priority',
        ];
    }

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
        
        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }
}
