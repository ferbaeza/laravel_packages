<?php

namespace Baezeta\Parser;

use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Parser::class, function ($app) {
            return new Parser();
        });

        // Registrar un alias
        $this->app->alias(Parser::class, 'baezeta.parser');
    }

    public function boot()
    {
        // Aquí puedes registrar rutas, vistas, comandos, etc.
        
        // Publicar configuración si la necesitas
        // $this->publishes([
        //     __DIR__.'/../config/parser.php' => config_path('parser.php'),
        // ], 'config');
        
        // Registrar comandos de artisan si los necesitas
        // if ($this->app->runningInConsole()) {
        //     $this->commands([
        //         // ParserCommand::class,
        //     ]);
        // }
    }
}
