<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Baezeta\Kernel\CommandQueryBus\Bus\Domain\Entities\QueryBus;
use Baezeta\Kernel\CommandQueryBus\Bus\Domain\Entities\CommandBus;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected QueryBus $queryBus;
    protected CommandBus $commandBus;

    protected function setUp(): void
    {
        parent::setUp();
        $this->queryBus = app(QueryBus::class);
        $this->commandBus = app(CommandBus::class);
    }
}
