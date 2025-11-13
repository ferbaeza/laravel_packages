<?php

namespace Devpack\Usuarios\Domain\Interfaces;

use Baezeta\Kernel\Criteria\Criteria;
use Devpack\Usuarios\Domain\Entity\Usuario;
use Devpack\Usuarios\Domain\Collection\UsuariosCollection;

interface UsuarioRepositoryInterface
{
    public function getEntity(Criteria $criteria): ?Usuario;
    public function getCollection(Criteria $criteria): UsuariosCollection;
}