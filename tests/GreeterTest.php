<?php
namespace Helhum\UnitTesting\Tests;

use Helhum\UnitTesting\Greeter;

class GreeterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function greetsTheWorld()
    {
        $greeter = new Greeter();
        $this->assertSame('Hello World', $greeter->greet());
    }

    /**
     * @test
     */
    public function greetsNameIfProvided()
    {
        $greeter = new Greeter();
        $this->assertSame('Hello Helmut', $greeter->greet('Helmut'));
    }

    /**
     * @test
     * @expectedException \Assert\InvalidArgumentException
     * @expectedExceptionCode 14
     */
    public function throwsExceptionIfEmptyValueIsProvidedOtherThanNull()
    {
        $greeter = new Greeter();
        $greeter->greet('');
    }

    /**
     * @test
     * @expectedException \Assert\InvalidArgumentException
     * @expectedExceptionCode 14
     */
    public function throwsExceptionIfEmptyValueIsProvidedOtherThanNull2()
    {
        $greeter = new Greeter();
        $greeter->greet('0');
    }

    /**
     * @test
     * @expectedException \Assert\InvalidArgumentException
     * @expectedExceptionCode 16
     */
    public function throwsExceptionIfNoStringIsProvided()
    {
        $greeter = new Greeter();
        $greeter->greet(1);
    }

    /**
     * @test
     * @expectedException \Assert\InvalidArgumentException
     * @expectedExceptionCode 16
     */
    public function throwsExceptionIfNoStringIsProvided2()
    {
        $greeter = new Greeter();
        $greeter->greet([1]);
    }

    /**
     * @test
     * @expectedException \Assert\InvalidArgumentException
     * @expectedExceptionCode 16
     */
    public function throwsExceptionIfNoStringIsProvided3()
    {
        $greeter = new Greeter();
        $greeter->greet(new self);
    }

}