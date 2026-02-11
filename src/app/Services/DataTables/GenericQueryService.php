<?php

namespace App\Services\DataTables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GenericQueryService
{
    protected string $searchColumn1;
    protected string $searchColumn2;

    public function __construct(string $searchColumn1 = 'name', string $searchColumn2 = 'email')
    {
        $this->searchColumn1 = $searchColumn1;
        $this->searchColumn2 = $searchColumn2;
    }

    public function filter(Request $request, Builder $query): Builder
    {
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where($this->searchColumn1, 'LIKE', "%$search%")
                  ->orWhere($this->searchColumn2, 'LIKE', "%$search%");
            });
        }

        return $query;
    }
}
