<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // omitir las rutas de debugbar para que no haya conflicto con el prefijo de idiomas
        if ($request->is('_debugbar*')) {
            return $next($request);
        }

        // Saltar el middleware para rutas API, oauth y otros
        if($request->is('oauth/token') ||
            $request->is('oauth/*') || 
            $request->is('api/*')) {
            return $next($request);
        }

        // Obtener el locale desde el primer segmento de la URL
        $locale = $request->segment(1);
        
        $availableLanguages = ['es', 'en'];

        // Si el locale no es válido, redirigir al locale por defecto
        if (!in_array($locale, $availableLanguages)) {
            $defaultLocale = 'es';
            return redirect("/$defaultLocale" . $request->getPathInfo());
        }

        // Establecer el locale si es diferente al de la sesión
        if ($locale !== Session::get('locale')) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }

        return $next($request);
    }

}


