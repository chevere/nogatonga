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

use Chevere\Nogatonga\Bind;
use Chevere\Nogatonga\Route;
use PHPUnit\Framework\TestCase;

final class BindTest extends TestCase
{
    public function testConstruct(): void
    {
        $routePath = new Route('/test');
        $view = '@';
        $route = new Bind(
            route: $routePath,
            view: $view,
        );
        $this->assertSame('', $route->name());
        $this->assertSame($routePath, $route->route());
        $this->assertSame($view, $route->view());
    }

    public function testWithName(): void
    {
        $route = new Bind(
            route: new Route('/'),
            view: '@',
        );
        $routeWithName = $route->withName('name');
        $this->assertNotSame($route, $routeWithName);
        $this->assertSame('name', $routeWithName->name());
    }
}
