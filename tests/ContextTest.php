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

use function Chevere\Nogatonga\bind;
use Chevere\Nogatonga\Context;
use PHPUnit\Framework\TestCase;

final class ContextTest extends TestCase
{
    public function testConstructDefaults(): void
    {
        $route = bind('/');
        $context = new Context(
            bind: $route,
        );
        $this->assertSame($route, $context->bind());
        $this->assertSame([], $context->navbar());
        $this->assertSame([], $context->data());
        $this->assertSame('en', $context->lang());
    }

    public function testConstruct(): void
    {
        $route = bind('/test')->withName('test');
        $navbar = ['/test' => 'Test'];
        $data = ['test' => 'test'];
        $context = new Context(
            bind: $route,
            navbar: $navbar,
            data: $data,
            lang: 'es'
        );
        $this->assertSame($route, $context->bind());
        $this->assertSame($navbar, $context->navbar());
        $this->assertSame($data, $context->data());
        $this->assertSame('es', $context->lang());
    }
}
