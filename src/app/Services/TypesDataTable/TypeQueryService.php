<?php

namespace App\Services\TypesDataTable;

use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Services\DataTables\BaseQueryService;


class TypeQueryService extends BaseQueryService
{
    protected function getSortableFields(): array
    {
        return [
            'name' => 'name',
            'description' => 'description',
        ];
    }

    public function getFilteredTypes(Request $request): Builder
    {
        $query = Type::query();

        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // Aplicar ordenamiento
        return $this->applyOrdering($query, $request);
    }

    public function countAll(): int
    {
        return Type::count();
    }
}