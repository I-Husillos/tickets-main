<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Si la sesión tiene un idioma, lo usamos. Si no, usamos el de config/app.php
        $locale = Session::get('locale', config('app.locale'));
        App::setLocale($locale);
        Session::put('locale', $locale);
    }
}

