<?php

namespace Devpack\Usuarios;

use Baezeta\Kernel\Laravel\Interfaces\ModuloKernelInterface;
use Devpack\Usuarios\Infrastructure\Bindings\UsuariosRegisterBindings;


class UsuariosMainRegisterBindings implements ModuloKernelInterface
{
    public static function bindings(): array
    {
        return array_merge(
            UsuariosRegisterBindings::bindings()
        );
    }
}
