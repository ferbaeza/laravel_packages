<?php

namespace Devpack\Usuarios\Application;

use Devpack\Usuarios\Domain\Services\LoginService;
use Devpack\Usuarios\Domain\Response\LoginResponse;
use Devpack\Usuarios\Domain\Exception\UsuarioNoEncontradoException;

class LoginCommandHandler
{
    public function __construct(
        private LoginService $loginService
    ) {
    }

    /**
     * Maneja el comando de login
     * 
     * @param LoginCommand $command
     * @return LoginResponse
     */
    public function handle(LoginCommand $command): LoginResponse
    {
        
        try {
            $usuario = $this->loginService->authenticate(
                $command->email,
                $command->password
            );
    
            return LoginResponse::success($usuario);

        } catch (UsuarioNoEncontradoException $e) {
            return LoginResponse::failure('Usuario no encontrado');
        }

    }
}