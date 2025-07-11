<?php

namespace App\Providers;

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
        // Автоматически определяет HTTPS на production
        if (!$this->app->isLocal()) {
            \URL::forceScheme('https');
        }
    }
}
