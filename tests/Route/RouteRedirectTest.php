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

namespace Chevere\Tests\Route;

use Chevere\Nogatonga\Route\RoutePath;
use Chevere\Nogatonga\Route\RouteRedirect;
use Chevere\Throwable\Exceptions\LogicException;
use PHPUnit\Framework\TestCase;

final class RouteRedirectTest extends TestCase
{
    public function testSamePath(): void
    {
        $path = new RoutePath('/from');
        $to = new RoutePath('/from');
        $this->expectException(LogicException::class);
        new RouteRedirect($path, $to);
    }

    public function testConstruct(): void
    {
        $path = new RoutePath('/from');
        $to = new RoutePath('/to');
        $routeRedirect = new RouteRedirect($path, $to);
        $this->assertSame($path, $routeRedirect->path());
        $this->assertSame($to, $routeRedirect->to());
    }
}
