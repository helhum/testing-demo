<?php
declare(strict_types=1);

namespace Helhum\UnitTesting\Tests;

use Helhum\UnitTesting\Greeter;
use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase
{
    /**
     * @test
     */
    public function greetsTheWorld(): void
    {
        $greeter = new Greeter();
        self::assertSame('Hello World', $greeter->greet());
    }
}
