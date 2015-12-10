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

/**
 * Class Member
 */
class Member
{
    /**
     * @var string
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}