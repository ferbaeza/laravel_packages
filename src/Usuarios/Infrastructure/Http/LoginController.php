<?php

namespace Devpack\src\Usuarios\Infrastructure\Http;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Devpack\src\Usuarios\Application\LoginCommand;
use Devpack\src\Usuarios\Application\LoginCommandHandler;
use Devpack\src\Usuarios\Infrastructure\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct(
        private LoginCommandHandler $loginCommandHandler
    ) {
    }

    /**
     * Maneja la petición de login
     * 
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        // Los datos ya están validados por LoginRequest
        $validated = $request->validated();

        // Crear comando
        $command = new LoginCommand(
            email: $validated['email'],
            password: $validated['password']
        );

        // Ejecutar caso de uso
        $result = $this->loginCommandHandler->handle($command);

        if ($result->isSuccess()) {
            $usuario = $result->getUsuario();
            
            return response()->json([
                'success' => true,
                'message' => 'Login exitoso',
                'data' => [
                    'usuario' => [
                        'id' => $usuario->getId(),
                        'name' => $usuario->getName(),
                        'email' => $usuario->getEmail(),
                        'isEmailVerified' => $usuario->isEmailVerified()
                    ]
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $result->getErrorMessage(),
            'errors' => ['credentials' => [$result->getErrorMessage()]]
        ], 401);
    }
}