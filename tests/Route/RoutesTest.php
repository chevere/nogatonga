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

use function Chevere\Nogatonga\route;
use function Chevere\Nogatonga\routeRedirect;
use function Chevere\Nogatonga\routes;
use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    public function testConstruct(): void
    {
        $routes = routes(
            one: route('/one'),
            two: route('/two'),
            redirect: routeRedirect('/from', '/to')
        );
        $this->assertCount(3, $routes);
    }
}
