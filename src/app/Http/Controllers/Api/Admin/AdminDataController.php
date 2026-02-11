<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\App;

use App\Services\DataTables\GenericQueryService;
use App\Services\DataTables\GenericDataActions;

class AdminDataController extends Controller
{

    public function indexAdmins(Request $request)
    {
        $admin = auth('api')->user();
        if (!$admin) {
            return response()->json(['error' => 'Token inválido'], 401);
        }

        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $queryService = new GenericQueryService();
        $query = $queryService->filter($request, Admin::query());

        $total = Admin::count();
        $filtered = $query->count();

        $admins = $query->skip($request->input('start', 0))
                        ->take($request->input('length', 10))
                        ->get();

        $actionService = new GenericDataActions(
            'routes.admin.admins.edit',
            'routes.admin.admins.confirm_delete',
            'components.actions.admin-actions',
            'admin'
        );

        $data = $admins->map(fn($admin) => $actionService->transform($admin, $locale));

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }


}


