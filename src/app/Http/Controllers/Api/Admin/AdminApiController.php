<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\EventHistory;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminApiController extends Controller
{

    public function storeAdmin(StoreAdminRequest $request)
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
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Administrador creado correctamente, puede volver a la lista de administradores.'
        ], 201);
    }

    public function updateAdmin(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();

        $admin->name = $data['name'];
        $admin->email = $data['email'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El administrador con email ' . $admin->email . ' y nombre ' . $admin->name . ' ha sido actualizado',
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Administrador actualizado correctamente.']);
    }

    public function destroyAdmin(Admin $admin)
    {
        $admin->delete();

        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El administrador con email ' . $admin->email . ' ha sido eliminado',
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Administrador eliminado correctamente.']);
    }
}
