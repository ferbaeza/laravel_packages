<?php

namespace Devpack\Usuarios\Domain\Exception;

use Exception;

class UserNotFoundException extends Exception
{
    public function __construct(string $email)
    {
        parent::__construct("Usuario no encontrado con el email: {$email}");
    }
}