<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(LarapexChart::class, function ($app) {
            return new LarapexChart;
        });
    }
    /**
     * Bootstrap any application services.
     */

    public function boot()
    {
        Paginator::useBootstrapFive(); // atau useBootstrapFour(); sesuai versi
    }

}
