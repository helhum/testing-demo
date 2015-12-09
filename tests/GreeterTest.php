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

}