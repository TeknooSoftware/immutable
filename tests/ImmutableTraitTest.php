<?php

namespace Teknoo\Tests\Immutable;

use Teknoo\Immutable\Exception\ImmutableException;
use Teknoo\Immutable\ImmutableInterface;
use Teknoo\Immutable\ImmutableTrait;

/**
 * Class ImmutableTraitTest
 * @package Teknoo\Tests\Immutable
 * @covers Teknoo\Immutable\ImmutableTrait
 */
class ImmutableTraitTest extends \PHPUnit_Framework_TestCase
{
    public function buildImmutableInstance()
    {
        return new class implements ImmutableInterface {
            use ImmutableTrait;
        };
    }

    /**
     * @expectedException \Teknoo\Immutable\Exception\ImmutableException
     */
    public function testSetException()
    {
        $this->buildImmutableInstance()->foo = 'bar';
    }

    /**
     * @expectedException \Teknoo\Immutable\Exception\ImmutableException
     */
    public function testUnsetException()
    {
        unset($this->buildImmutableInstance()->foo);
    }

    /**
     * @expectedException \Teknoo\Immutable\Exception\ImmutableException
     */
    public function testConstructor()
    {
        $this->buildImmutableInstance()->__construct();
    }
}