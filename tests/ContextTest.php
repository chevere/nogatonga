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

use Chevere\Nogatonga\Context;
use function Chevere\Nogatonga\route;
use PHPUnit\Framework\TestCase;

final class ContextTest extends TestCase
{
    public function testConstructDefaults(): void
    {
        $route = route('/');
        $context = new Context(
            route: $route,
        );
        $this->assertSame($route, $context->route());
        $this->assertSame([], $context->nav());
        $this->assertSame([], $context->data());
        $this->assertSame('en', $context->lang());
    }

    public function testConstruct(): void
    {
        $route = route('/test')->withName('test');
        $nav = ['/test' => 'Test'];
        $data = ['test' => 'test'];
        $context = new Context(
            route: $route,
            nav: $nav,
            data: $data,
            lang: 'es'
        );
        $this->assertSame($route, $context->route());
        $this->assertSame($nav, $context->nav());
        $this->assertSame($data, $context->data());
        $this->assertSame('es', $context->lang());
    }
}
