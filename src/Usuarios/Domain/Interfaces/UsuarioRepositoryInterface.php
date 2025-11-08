<?php

namespace Devpack\Usuarios\Domain\Interfaces;

use Devpack\Usuarios\Domain\Entity\Usuario;

interface UsuarioRepositoryInterface
{
    public function findByEmail(string $email): ?Usuario;
    public function findById(int $id): ?Usuario;
}