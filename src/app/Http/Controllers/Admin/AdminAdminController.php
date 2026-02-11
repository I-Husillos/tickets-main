<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\FilterUsersService;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\Cache\Store;

class AdminAdminController extends Controller
{
    private $filterUsersService;

    public function __construct(FilterUsersService $filterUsersService)
    {
        $this->filterUsersService = $filterUsersService;
    }

    public function showListAdmins(Request $request)
    {
        $admins = $this->filterUsersService->filter($request, Admin::class);
        return view('admin.management.listadmins', compact('admins'));
    }

    public function filterAdmins(Request $request)
    {
        $query = Admin::query();
    
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
    
        $admins = $query->paginate(10)->appends($request->query());
    
        return view('admin.management.listadmins', compact('admins'));
    }

    public function createAdmin()
    {
        return view('admin.management.createFormAdmin');
    }

    public function storeAdmin(StoreAdminRequest $request, String $locale)
    {
        $data = $request->validated();

        $admin = new Admin();

        $admin->name = $data['name'];
        $admin->email = $data['email'];

        $admin->password = Hash::make($request->password);
        $admin->superadmin = $request->boolean('superadmin');
        $admin->save();

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'El administrador con email ' . $admin->email . ' y nombre ' . $admin->name . ' ha sido registrado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.admins.list', ['locale' => $locale])->with('success', 'Administrador creado correctamente.');
    }


    public function confirmDeleteAdmin(String $locale, Admin $admin)
    {
        return view('admin.management.confirm-delete-admin', compact('admin'));
    }


    public function confirmDeleteAdminPost(String $locale, Admin $admin)
    {
        $admin->delete();

        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El administrador ' . $admin->name . ' ha sido eliminado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.admins', ['locale' => $locale])->with('success', 'Administrador eliminado correctamente.');
    }

    public function editAdmin(String $locale, Admin $admin)
    {
        return view('admin.management.editFormAdmin', compact('admin'));
    }


    public function updateAdmin(UpdateAdminRequest $request, String $locale, Admin $admin)
    {
        $data = $request->validated();
        
        $admin->name = $data['name'];
        $admin->email = $data['email'];


        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->superadmin = $request->boolean('superadmin');

        $admin->save();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El administrador con email ' . $admin->email . ' y nombre ' . $admin->name . ' ha sido actualizado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.admins', ['locale' => $locale])->with('success', 'Administrador actualizado correctamente.');
    }


    public function getAdminsAjax()
    {
        $admins = Admin::select('id', 'name', 'email')->get();

        $data = $admins->map(function ($admin) {
            return [
                'name' => $admin->name,
                'email' => $admin->email,
                'actions' => view('components.actions.admin-actions', ['admin' => $admin])->render()
            ];
        });

        return response()->json(["data" => $data]);
    }
}

