<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserApiAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Intentar autenticar
        if (!Auth::guard('admin')->attempt($credentials)) {
            return response()->json([
                'message' => 'Correo o contraseña incorrectos.'
            ], 401);
        }

        $admin = Auth::guard('admin')->user();
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
