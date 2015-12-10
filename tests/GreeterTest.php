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
     * @return array
     */
    public function invalidNullValues()
    {
        return array(
            'integer zero' => array(0),
            'string zero' => array('0'),
            'empty array' => array([]),
        );
    }

    /**
     * @param mixed $invalidValue
     *
     * @test
     * @dataProvider invalidNullValues
     *
     * @expectedException \Assert\InvalidArgumentException
     * @expectedExceptionCode 14
     */
    public function throwsExceptionIfEmptyValueIsProvidedOtherThanNull($invalidValue)
    {
        $greeter = new Greeter();
        $greeter->greet($invalidValue);
    }

    /**
     * @return array
     */
    public function invalidTypeValues()
    {
        return array(
            'integer one' => array(1),
            'object' => array(new self),
            'not empty array' => array([1]),
            'float' => array(3.141592),
        );
    }

    /**
     * @param mixed $invalidValue
     *
     * @test
     * @dataProvider invalidTypeValues
     *
     * @expectedException \Assert\InvalidArgumentException
     * @expectedExceptionCode 16
     */
    public function throwsExceptionIfNoStringIsProvided($invalidValue)
    {
        $greeter = new Greeter();
        $greeter->greet($invalidValue);
    }

}