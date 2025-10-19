<?php

namespace Devpack\src\Usuarios\Infrastructure\Bindings;

use Illuminate\Support\ServiceProvider;
use Devpack\src\Usuarios\Domain\Interfaces\UsuarioRepositoryInterface;
use Devpack\src\Usuarios\Infrastructure\Datasource\EloquentUsuarioRepository;
use Devpack\src\Usuarios\Domain\Services\LoginService;
use Devpack\src\Usuarios\Application\LoginCommandHandler;

class UsuariosServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind Repository Interface
        $this->app->bind(
            UsuarioRepositoryInterface::class,
            EloquentUsuarioRepository::class
        );

        // Bind LoginService
        $this->app->singleton(LoginService::class, function ($app) {
            return new LoginService(
                $app->make(UsuarioRepositoryInterface::class)
            );
        });

        // Bind LoginCommandHandler
        $this->app->singleton(LoginCommandHandler::class, function ($app) {
            return new LoginCommandHandler(
                $app->make(LoginService::class)
            );
        });
    }

    public function boot(): void
    {
        //
    }
}