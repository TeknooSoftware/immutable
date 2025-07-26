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

namespace Teknoo\Tests\Immutable;

use PHPUnit\Framework\TestCase;
use Teknoo\Immutable\Exception\ImmutableException;
use Teknoo\Immutable\ImmutableInterface;
use Teknoo\Immutable\ImmutableTrait;

/**
 * Tests ImmutableTraitTest for Teknoo\Immutable\ImmutableTrait
 * @copyright   Copyright (c) EIRL Richard Déloge (https://deloge.io - richard@deloge.io)
 * @copyright   Copyright (c) SASU Teknoo Software (https://teknoo.software - contact@teknoo.software)
 * @license     http://teknoo.software/license/mit         MIT License
 * @author      Richard Déloge <richard@teknoo.software>
 */
class ImmutableTraitTest extends TestCase
{
    public function buildImmutableInstance(): ImmutableInterface
    {
        return new class () implements ImmutableInterface {
            use ImmutableTrait;
        };
    }

    public function testSetException(): void
    {
        $this->expectException(ImmutableException::class);
        $this->buildImmutableInstance()->foo = 'bar';
    }

    public function testUnsetException(): void
    {
        $this->expectException(ImmutableException::class);
        unset($this->buildImmutableInstance()->foo);
    }

    public function testConstructor(): void
    {
        $this->expectException(ImmutableException::class);
        $this->buildImmutableInstance()->__construct();
    }

    public function testPHP8Constructor(): void
    {
        $this->expectException(ImmutableException::class);

        $code = <<<'EOF'
        return new class ('foo') implements Teknoo\Immutable\ImmutableInterface {
            use Teknoo\Immutable\ImmutableTrait;

            public function __construct(
                private string $var,
            ) {
                $this->uniqueConstructorCheck();
            }

            public function getVar(): string
            {
                return $this->var;
            }
        };

EOF;
        $object = eval($code);
        $this->assertEquals('foo', $object->getVar());
        $object->__construct('bar');
    }
}
