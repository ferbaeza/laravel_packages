<?php

namespace Devpack\src\Usuarios\Domain\Interfaces;

use Devpack\src\Usuarios\Domain\Entity\Usuario;

interface UsuarioRepositoryInterface
{
    public function findByEmail(string $email): ?Usuario;
    public function findById(int $id): ?Usuario;
}