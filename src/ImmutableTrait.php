<?php

/*
 * Immutable.
 *
 * LICENSE
 *
 * This source file is subject to the MIT license
 * license that are bundled with this package in the folder licences
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to richarddeloge@gmail.com so we can send you a copy immediately.
 *
 *
 * @copyright   Copyright (c) EIRL Richard Déloge (richarddeloge@gmail.com)
 * @copyright   Copyright (c) SASU Teknoo Software (https://teknoo.software)
 *
 * @link        http://teknoo.software/imuutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */

declare(strict_types=1);

namespace Teknoo\Immutable;

use Error;
use Teknoo\Immutable\Exception\ImmutableException;

/**
 * Default implementation of ImmutableInterface
 * Implement also a standard constructor to avoid multiple call of this method.
 *
 * @copyright   Copyright (c) EIRL Richard Déloge (richarddeloge@gmail.com)
 * @copyright   Copyright (c) SASU Teknoo Software (https://teknoo.software)
 *
 * @link        http://teknoo.software/imuutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */
trait ImmutableTrait
{
    private readonly bool $isConstructed;

    /*
     * Method to call in your custom constructor to forbid multiple call of '__construct'.
     */
    final protected function uniqueConstructorCheck(): ImmutableInterface
    {
        try {
            $this->isConstructed = true;
        } catch (Error $error) {
            throw new ImmutableException('This object is immutable', 0, $error);
        }

        return $this;
    }

    public function __construct()
    {
        $this->uniqueConstructorCheck();
    }

    final public function __set(string $name, $value)
    {
        throw new ImmutableException('This object is immutable');
    }

    final public function __unset(string $name)
    {
        throw new ImmutableException('This object is immutable');
    }
}
