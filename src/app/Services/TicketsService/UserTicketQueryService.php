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

        // Filtro por estado
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Filtro por prioridad
        if ($request->filled('priority')) {
            $query->where('priority', $request->input('priority'));
        }

        // Filtro por tipo
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        // Búsqueda de texto
        if ($request->filled('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
            });
        }

        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }
}
