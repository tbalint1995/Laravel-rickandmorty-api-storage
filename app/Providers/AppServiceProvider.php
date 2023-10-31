<?php

namespace App\Providers;

use App\Models\Episode;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Lekérjük az adatbázisból a legkorábbi és legkésőbbi "created" értékeket
        $dates = Episode::selectRaw(" MIN(created) AS `from`, MAX(created) AS `to`")->first();

        // Megosztjuk a nézetek között az adatot, hogy bárhol elérhető legyen
        View::share('dates', $dates);
    }
}
