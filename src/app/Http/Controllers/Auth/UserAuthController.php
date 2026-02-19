<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\EventHistory;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');


        if(!Auth::guard('user') -> attempt($credentials))
        {
            return back()->with('error', 'Correo o contraseña incorrectos.');
        }


        $user = auth('user') -> user();

        // revocar tokens del otro guard admin
        DB::table('oauth_access_tokens')
        ->where('user_id', $user->id)
        ->where('name', 'admin-session-token')
        ->update(['revoked' => true]);

        $token = $user->createToken('user-session-token')->accessToken;


        // Guardar el token en la sesión temporalmente
        session(['api_token' => $token]);


        return redirect()->route('user.dashboard', ['locale' => app()->getLocale()])->with('success', 'Inicio de sesión exitoso.');
    }


    // public function showRegisterForm()
    // {
    //     return view('auth.register');
    // }


    // public function register(RegisterUserRequest $request)
    // {
    //     $validated = $request->validated();
        

    //     $validated['password'] = Hash::make($validated['password']);

    //     $user = User::create($validated);


    //     EventHistory::create([
    //         'event_type' => 'Registro',
    //         'description' => 'Nuevo usuario registrado',
    //         'user' => $validated['name'],
    //     ]);

    //     Auth::guard('user')->login($user);

    //     // Generar token y guardar en sesión (para que el frontend lo guarde en localStorage)
    //     $token = $user->createToken('user-session-token')->accessToken;
    //     session(['api_token' => $token]);

    //     return redirect()->route('user.dashboard', ['locale' => app()->getLocale()])->with('success', '¡Registro exitoso! Bienvenido/a.');
    // }

    public function logOut()
    {
        Auth::guard('user')->logout();
        session()->forget('url.intended');
        return redirect()->route('login', ['locale' => app()->getLocale()]);
    }
}
