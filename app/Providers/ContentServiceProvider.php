<?php

namespace App\Providers;

use App\Models\Car;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.webapp', function ($view) {
            $view->with('cars',Car::all());
        });
    }
}
