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
use Assert\Assertion;

/**
 * Class Group
 */
class Group
{
    /**
     * @var Member[]
     */
    protected $members = [];

    /**
     * @var Greeter
     */
    protected $greeter;

    public function __construct(array $members, Greeter $greeter = null)
    {
        Assertion::allIsInstanceOf($members, Member::class);

        $this->members = $members;
        $this->greeter = $greeter ?: new Greeter();
    }

    public function greetEverybody()
    {
        $greetings = [];
        foreach ($this->members as $member) {
            $greetings[] = $this->greeter->greet($member->getName());
        }

        return implode(chr(10), $greetings);
    }

}