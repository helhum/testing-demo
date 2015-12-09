<?php
namespace Helhum\UnitTesting;

/*
 * This file is part of the unit testing demo package.
 *
 * (c) Helmut Hummel <info@helhum.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Class Greeter
 */
class Greeter
{
    /**
     * @param string $name
     * @return string
     */
    public function greet($name = null)
    {
        if ($name === null) {
            return 'Hello World';
        }

        \Assert\Assertion::notEmpty($name);
        \Assert\Assertion::string($name);

        return sprintf('Hello %s', $name);
    }

}