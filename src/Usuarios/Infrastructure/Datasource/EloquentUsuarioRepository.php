<?php

namespace Devpack\Usuarios\Infrastructure\Datasource;

use App\Models\User;
use Baezeta\Kernel\Criteria\Criteria;
use Baezeta\Kernel\Hydrator\Hydrator;
use Devpack\Usuarios\Domain\Entity\Usuario;
use Baezeta\Kernel\Laravel\Repository\BaseRepository;
use Devpack\Usuarios\Domain\Collection\UsuariosCollection;
use Devpack\Usuarios\Domain\Interfaces\UsuarioRepositoryInterface;
use Devpack\Usuarios\Domain\Exception\UsuarioNoEncontradoException;

class EloquentUsuarioRepository extends BaseRepository implements UsuarioRepositoryInterface
{
    public function model(): string
    {
        return User::class;
    }

    public function getEntity(Criteria $criteria): ?Usuario
    {
        $user = $this->getModelEntity($criteria);

        if (!$user) {
            throw new UsuarioNoEncontradoException();
        }
        return Hydrator::hydrate(Usuario::class, $user->toArray());
    }

    public function getCollection(Criteria $criteria): UsuariosCollection
    {
        $model = $this->getModelCollection($criteria);
        if (!$model) {
            return new UsuariosCollection();
        }
        return Hydrator::hydrate(UsuariosCollection::class, $model->toArray());
    }
}