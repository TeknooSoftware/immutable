<?php

namespace Teknoo\Immutable;

use Teknoo\Immutable\Exception\ImmutableException;

trait ImmutableTrait
{
    /**
     * @var bool
     */
    private $isConstructed = false;

    /**
     * Method to call in the constructor to avoid multiple call of '__construct'
     * @return self
     */
    protected function uniqueConstructorCheck()
    {
        if (true === $this->isConstructed) {
            throw new ImmutableException('This object is immutable');
        }

        $this->isConstructed = true;

        return $this;
    }

    /**
     * ImmutableTrait default constructor.
     */
    public function __construct()
    {
        $this->uniqueConstructorCheck();
    }

    /**
     * To forbid usage of __set
     * @param string $name
     * @throws ImmutableException
     */
    public function __set($name, $value)
    {
        throw new ImmutableException('This object is immutable');
    }

    /**
     * To forbid usage of __unset
     * @param string $name
     * @throws ImmutableException
     */
    public function __unset($name)
    {
        throw new ImmutableException('This object is immutable');
    }
}