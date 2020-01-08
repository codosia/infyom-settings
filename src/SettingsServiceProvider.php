<?php

namespace Codosia\InfyomSettings;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadTranslationsFrom(__DIR__.'/translations', 'InfyomSettings');
        $this->loadViewsFrom(__DIR__.'/views', 'InfyomSettings');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/InfyomSettings'),
        ]);
        $this->publishes([
            __DIR__.'/translations' => resource_path('lang/vendor/InfyomSettings'),
        ]);
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}