<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{


    public function redirectToLogin(Request $request)
    {
        $locale = $request->route('locale') ?? app()->getLocale();

        if (auth('admin')->check()) {
            return redirect()->route('admin.dashboard', ['locale' => $locale]);
        }

        return redirect()->route('admin.login', ['locale' => $locale]);
    }

    public function showLoginForm()
    {
        return view('auth.adminform');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::guard('admin')->attempt($credentials)) {
            return back()->with('error', 'Correo o contraseña incorrectos.');
        }

        $admin = auth('admin')->user();

        // revocar tokens del otro guard user
        DB::table('oauth_access_tokens')
            ->where('user_id', $admin->id)
            ->where('name', 'user-session-token')
            ->update(['revoked' => true]);

        $token = $admin->createToken('admin-session-token')->accessToken;

        // Guardar el token en la sesión temporalmente
        session(['api_token' => $token]);
        

        // Redirigir al dashboard (flujo tradicional)
        return redirect()->route('admin.manage.dashboard', ['locale' => app()->getLocale()]);
    }



    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login', ['locale' => app()->getLocale()]);
    }
}


