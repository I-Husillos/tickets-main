<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;

use App\Services\DataTables\GenericQueryService;
use App\Services\DataTables\GenericDataActions;

class UserDataController extends Controller
{
    public function indexUsers(Request $request)
    {
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $queryService = new GenericQueryService();
        $query = $queryService->filter($request, User::query());

        $total = User::count();
        $filtered = $query->count();

        $users = $query->skip($request->input('start', 0))
                    ->take($request->input('length', 10))
                    ->get();

        $actionService = new GenericDataActions(
            'routes.admin.users.edit',
            'routes.admin.users.confirm_delete',
            'components.actions.user-actions',
            'user'
        );

        $data = $users->map(fn($user) => $actionService->transform($user, $locale));

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

}