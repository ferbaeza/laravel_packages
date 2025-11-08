<?php

namespace Tests\Src\Usuarios;

use Tests\TestCase;
use Baezeta\Kernel\Hydrator\Hydrator;
use Devpack\Usuarios\Application\LoginCommand;

class LoginCommandHandlerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $data = [
            'email' => 'user@example.com',
            'password' => 'securepassword',
        ];
        $command = Hydrator::hydrate(LoginCommand::class, $data);
        dd($command);
    }
}
