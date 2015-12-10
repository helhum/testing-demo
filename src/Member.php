<?php
declare(strict_types=1);

namespace Helhum\UnitTesting;

class Member
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
