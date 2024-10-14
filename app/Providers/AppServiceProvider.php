<?php

namespace App\Providers;


use App\Services\MenuService;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }


    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('menu', function () {
            return new MenuService();
        });
    }
}
