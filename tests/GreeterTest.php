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

    public static function invalidValuesDataProvider(): array
    {
        return [
            'empty string' => [
                '',
                14,
            ],
            'zero' => [
                '0',
                14,
            ],
            'too short string' => [
                '12',
                18,
            ],
            'too long string' => [
                'Laoreet sapien sed est nulla neque urna orci himenaeos, rhoncus diam malesuada interdum nostra ac arcu mattis, curabitur at velit gravida aliquet ultrices luctus.',
                19,
            ],
        ];
    }

    /**
     * @param string $inputValue
     * @param int|string|null $expectedExceptionCode
     * @test
     * @dataProvider invalidValuesDataProvider
     */
    public function throwsExceptionIfEmptyValueIsProvidedOtherThanNull(string $inputValue, $expectedExceptionCode): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode($expectedExceptionCode);
        $greeter = new Greeter();
        $greeter->greet($inputValue);
    }
}
