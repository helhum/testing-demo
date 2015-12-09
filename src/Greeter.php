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

        \Assert\Assertion::notEmpty($name);
        \Assert\Assertion::minLength($name, 3);
        \Assert\Assertion::maxLength($name, 100);

        return sprintf('Hello %s', $name);
    }

}
