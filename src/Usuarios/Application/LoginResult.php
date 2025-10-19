<?php

namespace Devpack\src\Usuarios\Application;

use Devpack\src\Usuarios\Domain\Entity\Usuario;

class LoginResult
{
    public function __construct(
        private bool $success,
        private ?Usuario $usuario = null,
        private ?string $errorMessage = null
    ) {
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public static function success(Usuario $usuario): self
    {
        return new self(true, $usuario);
    }

    public static function failure(string $errorMessage): self
    {
        return new self(false, null, $errorMessage);
    }
}