<?php

namespace Teknoo\Immutable;

use Teknoo\Immutable\Exception\ImmutableException;

/**
 * Interface ImmutableInterface
 * @package Teknoo\Immutable
 */
interface ImmutableInterface
{
    /**
     * To forbid usage of __set
     * @param string $name
     * @throws ImmutableException
     */
    public function __set($name, $value);

    /**
     * To forbid usage of __unset
     * @param string $name
     * @throws ImmutableException
     */
    public function __unset($name);
}