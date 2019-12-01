<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor;

use Illuminate\Support\ServiceProvider;

class LaravelVisitorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-visitor.php',
            'laravel-visitor'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-visitor.php' => config_path('laravel-visitor.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
