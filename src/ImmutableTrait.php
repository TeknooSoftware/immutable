<?php

/**
 * Immutable.
 *
 * LICENSE
 *
 * This source file is subject to the MIT license and the version 3 of the GPL3
 * license that are bundled with this package in the folder licences
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to richarddeloge@gmail.com so we can send you a copy immediately.
 *
 *
 * @copyright   Copyright (c) 2009-2016 Richard Déloge (richarddeloge@gmail.com)
 *
 * @link        http://teknoo.software/imuutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */
namespace Teknoo\Immutable;

use Teknoo\Immutable\Exception\ImmutableException;

/**
 * Trait ImmutableTrait
 * Default implementation of ImmutableInterface
 * Implement also a standard constructor to avoid multiple call of this method.
 *
 * @copyright   Copyright (c) 2009-2016 Richard Déloge (richarddeloge@gmail.com)
 *
 * @link        http://teknoo.software/imuutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */
trait ImmutableTrait
{
    /**
     * @var bool
     */
    private $isConstructed = false;

    /**
     * Method to call in the constructor to avoid multiple call of '__construct'.
     *
     * @return self|ImmutableInterface
     */
    protected function uniqueConstructorCheck(): ImmutableInterface
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
     * {@inheritdoc}
     */
    public function __set(string $name, $value)
    {
        throw new ImmutableException('This object is immutable');
    }

    /**
     * {@inheritdoc}
     */
    public function __unset(string $name)
    {
        throw new ImmutableException('This object is immutable');
    }
}
