<?php
declare(strict_types=1);

namespace Helhum\UnitTesting;

use Assert\Assertion;

class Group
{
    /**
     * @var Member[]
     */
    protected $members = [];

    public function __construct(array $members)
    {
        Assertion::allIsInstanceOf($members, Member::class);

        $this->members = $members;
    }

    public function greetEverybody(Greeter $greeter): string
    {
        $greetings = [];
        foreach ($this->members as $member) {
            $greetings[] = $greeter->greet($member->getName());
        }

        return implode(PHP_EOL, $greetings);
    }

    public function isFull(int $maxCount): bool
    {
        return count($this->members) <= $maxCount;
    }
}
