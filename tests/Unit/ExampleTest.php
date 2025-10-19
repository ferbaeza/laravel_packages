<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Baezeta\Kernel\Entity\BaseKernelEntity;
use Baezeta\Kernel\Exceptions\BaseKernelException;
use Baezeta\Kernel\Collection\BaseKernelCollection;

class ExampleTest extends TestCase
{
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

}

class NewException extends BaseKernelException
{
    protected $message = 'exampleValue';

}
