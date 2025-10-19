<?php

namespace Devpack\src\Usuarios\Application;

use Devpack\src\Usuarios\Domain\Services\LoginService;
use Devpack\src\Usuarios\Domain\Exception\UserNotFoundException;
use Devpack\src\Usuarios\Domain\Exception\InvalidCredentialsException;

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
     * @return LoginResult
     */
    public function handle(LoginCommand $command): LoginResult
    {
        try {
            $usuario = $this->loginService->authenticate(
                $command->email,
                $command->password
            );

            return LoginResult::success($usuario);
        } catch (UserNotFoundException $e) {
            return LoginResult::failure('Usuario no encontrado con el email proporcionado');
        } catch (InvalidCredentialsException $e) {
            return LoginResult::failure($e->getMessage());
        } catch (\Exception $e) {
            return LoginResult::failure('Error interno del servidor');
        }
    }
}