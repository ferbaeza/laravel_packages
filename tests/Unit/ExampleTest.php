<?php

namespace Tests\Unit;

use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use Baezeta\Kernel\Entity\BaseKernelEntity;
use Baezeta\Kernel\Exceptions\BaseKernelException;
use Baezeta\Kernel\Collection\BaseKernelCollection;

class ExampleTest extends TestCase
{

    #[Test]
    // public function test_para_obtener_la_entidad_de_un_usuario(): void
    // {
    //     UsuariosModel::factory()->admin()->nombre('Juan')->create();

    //     $interface = app(UsuarioEloquentRepositoryInterface::class);
    //     $criteria = (new Criteria())
    //         ->add('where', ['nombre' => 'Juan'])
    //         ->add('where', ['admin' => true]);

    //     $entidad = $interface->getEntity($criteria);

    //     $this->assertInstanceOf(UsuarioBaseEntity::class, $entidad);
    // }

    
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $entidadUno = new NewEntity();
        $entidadDos = new NewEntity();
        $entidadUno->exampleProperty = 'valorUno';
        $entidadDos->exampleProperty = 'valorDos';

        $collection = new NewCollection([$entidadUno, $entidadDos]);
        dd($collection);
        $this->assertTrue(true);
    }
}

class NewCollection extends BaseKernelCollection
{
    protected $type = NewEntity::class;
    protected $name = 'NewCollection';
}

class NewEntity extends BaseKernelEntity
{
    public string $exampleProperty = 'exampleValue';

    public function toArray(): array
    {
        return [
            'exampleProperty' => $this->exampleProperty,
        ];
        
    }

}

class NewException extends BaseKernelException
{
    protected $message = 'exampleValue';

}
