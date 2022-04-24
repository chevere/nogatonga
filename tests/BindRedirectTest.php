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

use Chevere\Nogatonga\BindRedirect;
use Chevere\Nogatonga\Route;
use Chevere\Throwable\Exceptions\LogicException;
use PHPUnit\Framework\TestCase;

final class BindRedirectTest extends TestCase
{
    public function testSamePath(): void
    {
        $path = new Route('/from');
        $to = new Route('/from');
        $this->expectException(LogicException::class);
        new BindRedirect($path, $to);
    }

    public function testConstruct(): void
    {
        $path = new Route('/from');
        $to = new Route('/to');
        $routeRedirect = new BindRedirect($path, $to);
        $this->assertSame($path, $routeRedirect->route());
        $this->assertSame($to, $routeRedirect->to());
    }
}
