<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\FilterUsersService;

class AdminUserController extends Controller
{
    private $filterUsersService;

    public function __construct(FilterUsersService $filterUsersService)
    {
        $this->filterUsersService = $filterUsersService;
    }

    
    public function showListUsers()
    {
        $users = User::paginate(10, ['*'], 'users_pagination');

        return view('admin.management.listusers' , compact('users'));
    }

    public function filterUsers(Request $request)
    {
        $users = $this->filterUsersService->filter($request, User::class);
        return view('admin.management.listusers', compact('users'));
    }



    public function createUser()
    {
        return view('admin.management.createFormUser');
    }


    public function storeUser(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        
        $user->password = Hash::make($request->password);
        $user->save();

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'El usuario con email ' . $user->email . ' y nombre ' . $user->name . ' ha sido registrado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Usuario creado correctamente.',
            ]);
        }
        
        return redirect()->route('admin.dashboard.list.users', ['locale' => app()->getLocale()])->with('success', 'Usuario creado correctamente.');
    }

    public function confirmDeleteUser(String $locale, User $user)
    {
        return view('admin.management.confirm-delete-user', compact('user'));
    }

    public function confirmDeleteUserPost(String $locale, User $user)
    {
        $user->delete();

        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El usuario con email ' . $user->email . ' y nombre ' . $user->name . ' ha sido eliminado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.users', ['locale' => $locale])->with('success', 'Usuario eliminado correctamente.');
    }


    public function editUser(String $locale, User $user)
    {
        return view('admin.management.editFormUser', compact('user', 'locale'));
    }

    public function updateUser(String $locale, UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->name = $data['name'];
        $user->email = $data['email'];

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El usuario con email ' . $user->email . ' y nombre ' . $user->name . ' ha sido actualizado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.users', ['locale' => $locale])->with('success', 'Usuario actualizado correctamente.');
    }


    public function getUsersAjax(Request $request, string $locale)
    {
        $users = User::select(['id', 'name', 'email'])->get();

        $data = $users->map(function ($user) use ($locale) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'actions' => view('components.actions.user-actions', compact('user', 'locale'))->render(),
            ];
        });

        return response()->json(['data' => $data]);
    }

    
}

