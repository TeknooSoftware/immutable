<?php

/*
 * Immutable.
 *
 * LICENSE
 *
 * This source file is subject to the MIT license
 * it is available in LICENSE file at the root of this package
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to richard@teknoo.software so we can send you a copy immediately.
 *
 *
 * @copyright   Copyright (c) EIRL Richard Déloge (https://deloge.io - richard@deloge.io)
 * @copyright   Copyright (c) SASU Teknoo Software (https://teknoo.software - contact@teknoo.software)
 *
 * @link        http://teknoo.software/immutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richard@teknoo.software>
 */

declare(strict_types=1);

namespace Teknoo\Immutable;

use Error;
use Teknoo\Immutable\Exception\ImmutableException;

/**
 * Default implementation of ImmutableInterface
 * Implement also a standard constructor to avoid multiple call of this method.
 *
 * @copyright   Copyright (c) EIRL Richard Déloge (https://deloge.io - richard@deloge.io)
 * @copyright   Copyright (c) SASU Teknoo Software (https://teknoo.software - contact@teknoo.software)
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richard@teknoo.software>
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
