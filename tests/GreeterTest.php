<?php
declare(strict_types=1);

namespace Helhum\UnitTesting\Tests;

use Assert\InvalidArgumentException;
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

    /**
     * @test
     */
    public function greetsNameIfProvided(): void
    {
        $greeter = new Greeter();
        self::assertSame('Hello Helmut', $greeter->greet('Helmut'));
    }

    /**
     * @test
     */
    public function throwsExceptionIfEmptyValueIsProvidedOtherThanNull(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(14);
        $greeter = new Greeter();
        $greeter->greet('');
    }

    /**
     * @test
     */
    public function throwsExceptionIfEmptyValueIsProvidedOtherThanNull2(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(14);
        $greeter = new Greeter();
        $greeter->greet('0');
    }

    /**
     * @test
     */
    public function throwsExceptionIfStringIsTooShort(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(18);
        $greeter = new Greeter();
        $greeter->greet('12');
    }

    /**
     * @test
     */
    public function throwsExceptionIfStringIsTooLong(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(19);
        $greeter = new Greeter();
        $greeter->greet('Laoreet sapien sed est nulla neque urna orci himenaeos, rhoncus diam malesuada interdum nostra ac arcu mattis, curabitur at velit gravida aliquet ultrices luctus.');
    }
}
