<?php

namespace Devpack\Usuarios\Domain\Services;

use Illuminate\Support\Facades\Auth;
use Baezeta\Kernel\Criteria\Criteria;
use Devpack\Usuarios\Domain\Entity\Usuario;
use Baezeta\Kernel\ValueObjects\Email\EmailValue;
use Baezeta\Kernel\ValueObjects\Strings\StringValue;
use Devpack\Usuarios\Domain\Exception\InvalidCredentialsException;
use Devpack\Usuarios\Domain\Interfaces\UsuarioRepositoryInterface;
use Devpack\Usuarios\Domain\Exception\UsuarioNoEncontradoException;

class LoginService
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository
    ) {
    }

    /**
     * Autentica un usuario con email y contraseña
     * 
     * @param EmailValue $email
     * @param StringValue $password
     * @return Usuario
     * @throws UsuarioNoEncontradoException
     * @throws InvalidCredentialsException
     */
    public function authenticate(EmailValue $email, StringValue $password, bool $recordar = false): Usuario
    {
        if (Auth::attempt(['email' => $email->value(), 'password' => $password->value()], $recordar)) {

            $criteria = (new Criteria())->where('email', $email->value());
            return $this->usuarioRepository->getEntity($criteria);
        }
        throw new InvalidCredentialsException();
    }
}