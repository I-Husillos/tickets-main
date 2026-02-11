<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateWithLocale extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


     /**
     * Sobrescribe el método redirectTo para añadir el 'locale' a la ruta del login.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Obtiene el idioma de la URL o usa 'es' por defecto
            $locale = $request->segment(1) ?? 'es';

            // Redirige al login con el locale correcto
            return route('login', ['locale' => $locale]);
        }
    }
}
