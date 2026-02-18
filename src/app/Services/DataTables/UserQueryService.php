<?php

namespace App\Services\DataTables;

use App\Models\User;
use Illuminate\Http\Request;

class UserQueryService extends BaseQueryService
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
        $query = User::select('users.*');

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
