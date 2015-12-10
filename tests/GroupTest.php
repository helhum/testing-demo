<?php
namespace Helhum\UnitTesting\Tests;

use Helhum\UnitTesting\Greeter;
use Helhum\UnitTesting\Group;
use Helhum\UnitTesting\Member;
use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{
    /**
     * @test
     */
    public function groupIsFullRespectsMembersCount(): void
    {
        $memberDummy = $this->getMockBuilder(Member::class)->disableOriginalConstructor()->getMock();
        $group = new Group([$memberDummy, $memberDummy, $memberDummy]);

        self::assertFalse($group->isFull(2));
        self::assertTrue($group->isFull(3));
    }

    /**
     * @test
     */
    public function greetingGreetsMember(): void
    {
        $memberStub = new Member('Stub');

        $group = new Group([$memberStub]);
        $expectedGreetings = 'Hello Stub';

        self::assertSame($expectedGreetings, $group->greetEverybody(new Greeter()));
    }

    /**
     * @test
     */
    public function greetingGreetsAllMembers(): void
    {
        $group = new Group([new Member('Helmut'), new Member('Wouter')]);
        $expectedGreetings = 'Hello Helmut' . chr(10) . 'Hello Wouter';

        self::assertSame($expectedGreetings, $group->greetEverybody(new Greeter()));
    }

    /**
     * @test
     */
    public function greetEverybodyPassesMembersToGreeter(): void
    {
        $memberMock = $this->getMockBuilder(Member::class)->disableOriginalConstructor()->getMock();
        $memberMock->method('getName')->willReturn('Dummy');

        $greeterMock = $this->getMockBuilder(Greeter::class)->getMock();
        $greeterMock
            ->expects(self::exactly(3))
            ->method('greet')
            ->with('Dummy');

        $group = new Group([$memberMock, $memberMock, $memberMock]);
        $group->greetEverybody($greeterMock);
    }
}
