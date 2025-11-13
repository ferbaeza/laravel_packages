<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Devpack\Usuarios\UsuariosMainRegisterBindings;

class RegisterBindingsServiceProvider extends ServiceProvider
{
    /**
     * Seguir orden alfabético para facilitar encontrar los módulos
     *
     * @var array
     */
    protected $packagesBindingsRegister = [
        UsuariosMainRegisterBindings::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->packagesBindingsRegister as $packageRegister) {
            $bindings = $packageRegister::bindings();
            foreach ($bindings as $interface => $implementation) {
                $this->app->bind($interface, $implementation);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
