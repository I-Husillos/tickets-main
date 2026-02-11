<?php

namespace App\Services\TypesDataTable;

use Illuminate\Support\Facades\View;
use App\Models\Type;



class TypeDataActions
{
    public function transform(Type $type, string $locale): array
    {
        $editUrl = url("/$locale/" . trans('routes.admin.types.edit', [], $locale));
        $editUrl = str_replace('{type}', $type->id, $editUrl);

        $deleteUrl = url("/$locale/" . trans('routes.admin.types.confirm_delete', [], $locale));
        $deleteUrl = str_replace('{type}', $type->id, $deleteUrl);

        return [
            'name' => $type->name,
            'description' => $type->description,
            'actions' => View::make('components.actions.type-actions', [
                'type' => $type,
            ])->render(),
        ];
    }
}


