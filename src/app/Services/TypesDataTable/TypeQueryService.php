<?php

namespace App\Services\TypesDataTable;

use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class TypeQueryService
{
    public function getFilteredTypes(Request $request): Builder
    {
        $query = Type::query();

        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        return $query;
    }

    public function countAll(): int
    {
        return Type::count();
    }
}