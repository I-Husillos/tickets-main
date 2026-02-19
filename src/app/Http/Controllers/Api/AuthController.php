<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
// use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    // // Registro
    // public function register(RegisterUserRequest $request)
    // {
    //     $validated = $request->validated();
    //
    //
    //     if ($validated->fails()) {
    //         return response()->json($validated->errors(), 422);
    //     }
    //
    //     $user = User::create([
    //         'name'     => $request->name,
    //         'email'    => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);
    //
    //     $token = $user->createToken('API Token')->accessToken;
    //
    //     return response()->json([
    //         'user'  => $user,
    //         'token' => $token,
    //     ]);
    // }

    // Login
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth('admin')->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $admin = auth('admin')->user();
        $token = $admin->createToken('admin-session-token')->accessToken;

        return response()->json([
            'access_token' => $token
        ]);
    }


    // Obtener usuario autenticado
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}


