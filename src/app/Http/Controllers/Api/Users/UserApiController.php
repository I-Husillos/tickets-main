<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
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
            'user' => Auth::guard('api')->user()->name, // si se usa token
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado correctamente.'
        ], 201);
    }

    public function updateUser(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->name = $data['name'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El usuario con email ' . $user->email . ' ha sido actualizado',
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Usuario actualizado correctamente.']);
    }


    public function destroyUser(User $user)
    {
        $user->delete();

        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El usuario con email ' . $user->email . ' ha sido eliminado',
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Usuario eliminado correctamente.']);
    }

}

