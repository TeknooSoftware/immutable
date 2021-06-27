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
 * @copyright   Copyright (c) 2009-2021 EIRL Richard Déloge (richarddeloge@gmail.com)
 * @copyright   Copyright (c) 2020-2021 SASU Teknoo Software (https://teknoo.software)
 *
 * @link        http://teknoo.software/imuutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */

declare(strict_types=1);

namespace Teknoo\Immutable;

use Teknoo\Immutable\Exception\ImmutableException;

/**
 * Default implementation of ImmutableInterface
 * Implement also a standard constructor to avoid multiple call of this method.
 *
 * @copyright   Copyright (c) 2009-2021 EIRL Richard Déloge (richarddeloge@gmail.com)
 * @copyright   Copyright (c) 2020-2021 SASU Teknoo Software (https://teknoo.software)
 *
 * @link        http://teknoo.software/imuutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 */
trait ImmutableTrait
{
    private bool $isConstructed = false;

    /*
     * Method to call in your custom constructor to forbid multiple call of '__construct'.
     */
    protected function uniqueConstructorCheck(): ImmutableInterface
    {
        if (true === $this->isConstructed) {
            throw new ImmutableException('This object is immutable');
        }

        $this->isConstructed = true;

        return $this;
    }

    public function __construct()
    {
        $this->uniqueConstructorCheck();
    }

    public function __set(string $name, $value)
    {
        throw new ImmutableException('This object is immutable');
    }

    public function __unset(string $name)
    {
        throw new ImmutableException('This object is immutable');
    }
}
