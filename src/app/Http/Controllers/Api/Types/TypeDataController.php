<?php

namespace App\Http\Controllers\Api\Types;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\App;

use App\Services\TypesDataTable\TypeQueryService;
use App\Services\TypesDataTable\TypeDataActions;


class TypeDataController extends Controller
{
    protected $typeQueryService;
    protected $typeDataActions;

    public function __construct(TypeQueryService $typeQueryService, TypeDataActions $typeDataActions)
    {
        $this->typeQueryService = $typeQueryService;
        $this->typeDataActions = $typeDataActions;
    }

    public function indexTypes(Request $request)
    {
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $query = $this->typeQueryService->getFilteredTypes($request);

        $total = $this->typeQueryService->countAll();
        $filtered = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $types = $query->skip($start)->take($length)->get();

        $data = $types->map(fn ($type) => $this->typeDataActions->transform($type, $locale));

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }
}


