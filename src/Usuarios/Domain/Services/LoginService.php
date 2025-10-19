<?php

namespace Devpack\src\Usuarios\Domain\Services;

use Devpack\src\Usuarios\Domain\Entity\Usuario;
use Devpack\src\Usuarios\Domain\Interfaces\UsuarioRepositoryInterface;
use Devpack\src\Usuarios\Domain\Exception\InvalidCredentialsException;
use Devpack\src\Usuarios\Domain\Exception\UserNotFoundException;

class LoginService
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository
    ) {
    }

    /**
     * Autentica un usuario con email y contraseña
     * 
     * @param string $email
     * @param string $password
     * @return Usuario
     * @throws UserNotFoundException
     * @throws InvalidCredentialsException
     */
    public function authenticate(string $email, string $password): Usuario
    {
        // Validar formato de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidCredentialsException('El formato del email no es válido');
        }

        // Validar que la contraseña no esté vacía
        if (empty(trim($password))) {
            throw new InvalidCredentialsException('La contraseña no puede estar vacía');
        }

        // Buscar usuario por email
        $usuario = $this->usuarioRepository->findByEmail($email);

        if ($usuario === null) {
            throw new UserNotFoundException($email);
        }

        // Verificar contraseña
        if (!$usuario->verifyPassword($password)) {
            throw new InvalidCredentialsException('La contraseña proporcionada es incorrecta');
        }

        return $usuario;
    }

    /**
     * Verifica si las credenciales son válidas sin lanzar excepciones
     * 
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function isValidCredentials(string $email, string $password): bool
    {
        try {
            $this->authenticate($email, $password);
            return true;
        } catch (UserNotFoundException|InvalidCredentialsException) {
            return false;
        }
    }
}