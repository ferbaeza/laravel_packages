<?php

namespace Vendor\MyPackage;

use Illuminate\Support\ServiceProvider;

class MyPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MyPackage::class, function ($app) {
            return new MyPackage();
        });
    }

    public function boot()
    {
        // Aquí puedes registrar rutas, vistas, migraciones, etc.
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'my-package');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        // Publicar archivos de configuración
        // $this->publishes([
        //     __DIR__.'/../config/my-package.php' => config_path('my-package.php'),
        // ], 'config');
    }
}
