<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * El nombre de la ruta principal del sistema.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Registra los servicios de rutas.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $currentLocale = app()->getLocale();
            $alternateLocale = $currentLocale === 'es' ? 'en' : 'es';
        
            $currentRoute = Route::current();
            $routeName = $currentRoute?->getName();
            $routeParameters = $currentRoute?->parameters() ?? [];
        
            $alternateUrl = url("/$alternateLocale");
        
            if ($routeName && isset($routeParameters)) {
                try {
                    // Carga las traducciones del otro idioma
                    $translatedRoutes = trans('routes', [], $alternateLocale);
        
                    // Obtiene la ruta traducida usando el nombre
                    $translatedPath = $translatedRoutes[$routeName] ?? null;
        
                    if ($translatedPath) {
                        // Reemplaza los parámetros en la URL
                        foreach ($routeParameters as $key => $value) {
                            $translatedPath = str_replace("{{$key}}", is_object($value) ? $value->id : $value, $translatedPath);
                        }
                        
        
                        $alternateUrl = url("/$alternateLocale/$translatedPath");
                    }
        
                } catch (\Exception $e) {
                    $alternateUrl = url("/$alternateLocale");
                }
            }
        
            $view->with([
                'currentLocale' => $currentLocale,
                'alternateLocale' => $alternateLocale,
                'alternateUrl' => $alternateUrl,
            ]);
        });
        

        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

    }
    

    /**
     * Registra los servicios de rutas.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
