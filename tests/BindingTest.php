<?php

/*
 * This file is part of Chevere.
 *
 * (c) Rodolfo Berrios <rodolfo@chevere.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Chevere\Tests;

use function Chevere\Danky\callerDir;
use function Chevere\Nogatonga\bind;
use Chevere\Nogatonga\Binding;
use function Chevere\Nogatonga\binding;
use function Chevere\Nogatonga\bindRedirect;
use Chevere\Throwable\Exceptions\OverflowException;
use PHPUnit\Framework\TestCase;

final class BindingTest extends TestCase
{
    public function testConstruct(): void
    {
        $routes = binding(
            one: bind('/one'),
            two: bind('/two'),
            redirect: bindRedirect('/from', '/to')
        );
        $this->assertCount(3, $routes);
    }

    public function testCollision(): void
    {
        $this->expectException(OverflowException::class);
        $this->expectExceptionMessage('Path /one has been already registered by route one');
        new Binding(
            callerDir(),
            one: bind('/one'),
            two: bind('/one'),
        );
    }
}
