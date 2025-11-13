<?php

namespace Devpack\Usuarios\Domain\Collection;

use Devpack\Usuarios\Domain\Entity\Usuario;
use Baezeta\Kernel\Collection\BaseKernelCollection;


class UsuariosCollection extends BaseKernelCollection
{
   protected $type = Usuario::class;
   protected $name = 'usuarios';
}
