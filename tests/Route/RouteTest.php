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

use Chevere\Nogatonga\Route\Route;
use Chevere\Nogatonga\Route\RoutePath;
use PHPUnit\Framework\TestCase;

final class RouteTest extends TestCase
{
    public function testConstruct(): void
    {
        $routePath = new RoutePath('/test');
        $view = '@';
        $route = new Route(
            path: $routePath,
            view: $view,
        );
        $this->assertSame('', $route->name());
        $this->assertSame($routePath, $route->path());
        $this->assertSame($view, $route->view());
    }

    public function testWithName(): void
    {
        $route = new Route(
            path: new RoutePath('/'),
            view: '@',
        );
        $routeWithName = $route->withName('name');
        $this->assertNotSame($route, $routeWithName);
        $this->assertSame('name', $routeWithName->name());
    }
}
