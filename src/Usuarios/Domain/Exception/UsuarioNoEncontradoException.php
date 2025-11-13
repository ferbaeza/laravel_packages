<?php

namespace Devpack\Usuarios\Domain\Exception;

use Baezeta\Kernel\Exceptions\BaseKernelException;

class UsuarioNoEncontradoException extends BaseKernelException
{
    protected $message = 'Usuario no encontrado';
}