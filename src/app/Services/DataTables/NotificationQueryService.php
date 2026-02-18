<?php

namespace App\Services\DataTables;

use Illuminate\Http\Request;

class NotificationQueryService extends BaseQueryService
{
    protected function getSortableFields(): array
    {
        return [
            'type' => 'data->type',
            'content' => 'data->message',
            'created_at' => 'created_at',
        ];
    }

    /**
     * Construye la query ordenada para notificaciones del admin
     * 
     * @param Request $request
     * @param mixed $adminNotificationsQuery - Query del admin (admin->notifications())
     * @return mixed
     */
    public function buildQuery(Request $request, $adminNotificationsQuery)
    {
        $query = $adminNotificationsQuery;

        // Búsqueda
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('data->message', 'LIKE', "%{$search}%")
                  ->orWhere('data->type', 'LIKE', "%{$search}%")
                  ->orWhere('data->assigned_by', 'LIKE', "%{$search}%")
                  ->orWhere('data->closed_by', 'LIKE', "%{$search}%");
            });
        }

        // Filtro de tipo
        if ($request->filled('type')) {
            $query->where('data->type', $request->input('type'));
        }

        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }
}
