<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use App\Models\EventHistory;
use Illuminate\Http\Request;use Illuminate\Validation\Rule;
use App\Services\TypeService;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Dotenv\Util\Str;

class TypesController
{
    protected $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(StoreTypeRequest $request)
    {
        $validated = $request->validated();

        $locale = app()->getLocale();
        $this->typeService->createType($validated);

        return redirect()->route('admin.types.index', ['locale' => $locale])->with('success', 'Tipo creado con éxito.');
    }

    public function edit(String $locale, Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(String $locale, UpdateTypeRequest $request, Type $type)
    {
        $validated = $request->validated();

        $this->typeService->updateType($type, $validated);

        return redirect()->route('admin.types.index', ['locale' => $locale])->with('success', 'Tipo actualizado con éxito.');
    }


    public function destroy(String $locale, Type $type)
    {
        $this->typeService->deleteType($type);

        return redirect()->route('admin.types.index', ['locale' => $locale])->with('success', 'Tipo eliminado con éxito.');
    }

    public function confirmDelete(String $locale, Type $type)
    {
        return view('admin.types.confirm-delete', compact('type'));
    }

    public function getTypesAjax()
    {
        $types = Type::select('id', 'name', 'description')->get();

        $data = $types->map(function ($type) {
            return [
                'name' => $type->name,
                'description' => $type->description,
                'actions' => view('components.actions.type-actions', compact('type'))->render()
            ];
        });

        return response()->json(['data' => $data]);
    }

}

