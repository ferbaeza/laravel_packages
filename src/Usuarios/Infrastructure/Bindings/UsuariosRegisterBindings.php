<?php

namespace Devpack\Usuarios\Infrastructure\Bindings;

use Baezeta\Kernel\Laravel\Interfaces\ModuloKernelInterface;
use Devpack\Usuarios\Domain\Interfaces\UsuarioRepositoryInterface;
use Devpack\Usuarios\Infrastructure\Datasource\EloquentUsuarioRepository;



class UsuariosRegisterBindings implements ModuloKernelInterface
{
    public static function bindings():array
    {
        return [
            UsuarioRepositoryInterface::class => EloquentUsuarioRepository::class,
        ];
    }
}
