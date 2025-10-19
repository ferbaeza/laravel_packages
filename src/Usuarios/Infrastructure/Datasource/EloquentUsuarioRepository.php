<?php

namespace Devpack\src\Usuarios\Infrastructure\Datasource;

use App\Models\User;
use Devpack\src\Usuarios\Domain\Entity\Usuario;
use Devpack\src\Usuarios\Domain\Interfaces\UsuarioRepositoryInterface;

class EloquentUsuarioRepository implements UsuarioRepositoryInterface
{
    public function findByEmail(string $email): ?Usuario
    {
        $user = User::where('email', $email)->first();

        if ($user === null) {
            return null;
        }

        return $this->mapToEntity($user);
    }

    public function findById(int $id): ?Usuario
    {
        $user = User::find($id);

        if ($user === null) {
            return null;
        }

        return $this->mapToEntity($user);
    }

    private function mapToEntity(User $user): Usuario
    {
        return new Usuario(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            password: $user->password,
            emailVerifiedAt: $user->email_verified_at
        );
    }
}