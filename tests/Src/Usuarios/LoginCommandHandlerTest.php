<?php

namespace Tests\Src\Usuarios;

use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Test;
use Baezeta\Kernel\Criteria\Criteria;
use Baezeta\Kernel\Hydrator\Hydrator;
use Devpack\Usuarios\Application\LoginCommand;
use Devpack\Usuarios\Domain\Response\LoginResponse;
use Devpack\Usuarios\Application\ObtenerUsuariosQuery;
use Devpack\Usuarios\Domain\Collection\UsuariosCollection;
use Devpack\Usuarios\Domain\Exception\InvalidCredentialsException;
use Devpack\Usuarios\Domain\Exception\UsuarioNoEncontradoException;

class LoginCommandHandlerTest extends TestCase
{
    #[Test]
    public function test_the_application_returns_a_exception_when_user_not_found(): void
    {
        $this->expectException(InvalidCredentialsException::class);
        $data = [
            'email' => 'user@example.com',
            'password' => 'securepassword',
        ];
        $command = Hydrator::hydrate(LoginCommand::class, $data);
        $this->commandBus->process($command);

    }

    #[Test]
    public function test_the_application_returns_a_successful_response(): void
    {
        $user = User::factory()->create();
        $data = [
            'email' => $user->email,
            'password' => 'password',
        ];
        $command = Hydrator::hydrate(LoginCommand::class, $data);
        $response = $this->commandBus->process($command);

        $this->assertInstanceOf(LoginResponse::class, $response);
        $this->assertTrue($response->isSuccess());
        $this->assertNotNull($response->getUsuario());
    }

    #[Test]
    public function test_the_application_returns_a_collection_response(): void
    {
        $user = User::factory()->state(['email' => 'user@example.com'])->create();
        User::factory()->count(10)->create();

        $command = new ObtenerUsuariosQuery();
        $response = $this->commandBus->process($command);


        $criteria = (new Criteria())->where('email', 'user@example.com');
        $entidad = $response->findEntity($criteria);

        $this->assertEquals($user->email, $entidad->getEmail());

        $this->assertInstanceOf(UsuariosCollection::class, $response);

    }
}
