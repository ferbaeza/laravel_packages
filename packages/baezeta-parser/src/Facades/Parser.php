<?php

namespace Baezeta\Parser\Facades;

use Illuminate\Support\Facades\Facade;

class Parser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'baezeta.parser';
    }
}
