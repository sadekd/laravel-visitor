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
        ], 'config');

        if (!class_exists('CreateVisitorsTables')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_visitors_tables.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_visitors_tables.php'),
            ], 'migrations');
        }
    }
}
