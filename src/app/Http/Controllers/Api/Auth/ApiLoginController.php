<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar entrada
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar con el guard de admins
        if (!Auth::guard('admin')->attempt($credentials)) {
            return response()->json([
                'message' => 'Correo o contraseña incorrectos.'
            ], 401);
        }

        $admin = Auth::guard('admin')->user();

        // Crear token personal de acceso (Passport)
        $token = $admin->createToken('admin-session-token')->accessToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'token' => $token,
            'admin' => [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
            ],
        ]);
    }

}


