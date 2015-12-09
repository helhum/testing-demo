<?php
declare(strict_types=1);

namespace Helhum\UnitTesting;

class Greeter
{
    public function greet(string $name = null): string
    {
        if ($name === null) {
            return 'Hello World';
        }

        return sprintf('Hello %s', $name);
    }

}
