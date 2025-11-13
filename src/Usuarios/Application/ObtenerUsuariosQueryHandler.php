<?php

namespace Devpack\Usuarios\Application;

use Baezeta\Kernel\Criteria\Criteria;
use Devpack\Usuarios\Domain\Collection\UsuariosCollection;
use Devpack\Usuarios\Domain\Interfaces\UsuarioRepositoryInterface;


class ObtenerUsuariosQueryHandler
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository
    ) {
    }

    public function handle(ObtenerUsuariosQuery $command): UsuariosCollection
    {

        $criteria = (new Criteria());
        return $this->usuarioRepository->getCollection($criteria);
   }
}