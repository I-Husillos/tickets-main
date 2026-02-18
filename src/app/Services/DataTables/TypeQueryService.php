<?php

namespace App\Services\DataTables;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeQueryService extends BaseQueryService
{
    protected function getSortableFields(): array
    {
        return [
            'name' => 'name',
            'description' => 'description',
        ];
    }

    public function buildQuery(Request $request)
    {
        $query = Type::select('types.*');

        // Búsqueda
        $search = $request->input('search.value');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
            });
        }

        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }
}
