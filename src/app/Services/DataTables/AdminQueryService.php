<?php

namespace App\Services\DataTables;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminQueryService extends BaseQueryService
{
    protected function getSortableFields(): array
    {
        return [
            'name' => 'name',
            'email' => 'email',
        ];
    }

    public function buildQuery(Request $request)
    {
        $query = Admin::select('admins.*');

        // Búsqueda
        $search = $request->input('search.value');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }
}
