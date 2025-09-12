<?php

namespace Vendor\MyPackage;

class MyPackage
{
    public function greet(string $name = 'World'): string
    {
        return "Hello, {$name}! This is from my custom package.";
    }
}
