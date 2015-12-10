<?php
namespace Helhum\UnitTesting\Tests;

use Helhum\UnitTesting\Greeter;
use Helhum\UnitTesting\Group;
use Helhum\UnitTesting\Member;

class GroupTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function greetingGreetsAllMembers()
    {
        $group = new Group(array(new Member('Helmut'), new Member('Wouter')), new Greeter());
        $expectedGreetings = 'Hello Helmut' . chr(10) . 'Hello Wouter';

        $this->assertSame($expectedGreetings, $group->greetEverybody());
    }

    /**
     * @test
     */
    public function greetingGreetsMemberDummy()
    {
        $memberDummy = $this->getMock('Helhum\\UnitTesting\\Member', array(), array('dummy'));
        $group = new Group(array($memberDummy), new Greeter());
        $expectedGreetings = 'Hello World';

        $this->assertSame($expectedGreetings, $group->greetEverybody());
    }

    /**
     * @test
     */
    public function greetingGreetsMemberStub()
    {
        $memberDummy = $this->getMock('Helhum\\UnitTesting\\Member', array(), array('dummy'));
        $memberDummy->expects($this->any())->method('getName')->willReturn('Stub');

        $group = new Group(array($memberDummy), new Greeter());
        $expectedGreetings = 'Hello Stub';

        $this->assertSame($expectedGreetings, $group->greetEverybody());
    }

    /**
     * @test
     */
    public function greetingGreetsUsesGreeterMockCorrectly()
    {
        $memberDummy = $this->getMock('Helhum\\UnitTesting\\Member', array(), array('dummy'));
        $greeterMock = $this->getMock('Helhum\\UnitTesting\\Greeter');
        $greeterMock->expects($this->exactly(3))->method('greet');

        $group = new Group(array($memberDummy, $memberDummy, $memberDummy), $greeterMock);
        $group->greetEverybody();
    }

}