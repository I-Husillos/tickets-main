<?php

namespace App\Providers;

use App\Jobs\PruneEventHistory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
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

        if (!Cache::has('prune_event_history_scheduled')) {
            Cache::put('prune_event_history_scheduled', true, now()->addDays(30));
            PruneEventHistory::dispatch()->delay(now()->addDays(30));
        }
    }
}

