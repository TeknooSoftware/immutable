<?php

/**
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

namespace Teknoo\Tests\Immutable;

use Teknoo\Immutable\Exception\ImmutableException;
use Teknoo\Immutable\ImmutableInterface;
use Teknoo\Immutable\ImmutableTrait;

/**
 * Tests ImmutableTraitTest for Teknoo\Immutable\ImmutableTrait
 * @copyright   Copyright (c) 2009-2021 EIRL Richard Déloge (richarddeloge@gmail.com)
 * @copyright   Copyright (c) 2020-2021 SASU Teknoo Software (https://teknoo.software)
 *
 * @link        http://teknoo.software/imuutable Project website
 *
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richarddeloge@gmail.com>
 *
 * @covers Teknoo\Immutable\ImmutableTrait
 */
class ImmutableTraitTest extends \PHPUnit\Framework\TestCase
{
    public function buildImmutableInstance()
    {
        return new class implements ImmutableInterface {
            use ImmutableTrait;
        };
    }

    public function testSetException()
    {
        $this->expectException(ImmutableException::class);
        $this->buildImmutableInstance()->foo = 'bar';
    }

    public function testUnsetException()
    {
        $this->expectException(ImmutableException::class);
        unset($this->buildImmutableInstance()->foo);
    }

    public function testConstructor()
    {
        $this->expectException(ImmutableException::class);
        $this->buildImmutableInstance()->__construct();
    }
}
