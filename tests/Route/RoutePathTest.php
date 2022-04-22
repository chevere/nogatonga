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
use Chevere\Str\Exceptions\StrContainsException;
use Chevere\Str\Exceptions\StrCtypeSpaceException;
use Chevere\Str\Exceptions\StrEmptyException;
use Chevere\Str\Exceptions\StrEndsWithException;
use Chevere\Str\Exceptions\StrNotStartsWithException;
use PHPUnit\Framework\TestCase;

final class RoutePathTest extends TestCase
{
    public function testEmpty(): void
    {
        $this->expectException(StrEmptyException::class);
        new RoutePath('');
    }

    public function testSpaces(): void
    {
        $this->expectException(StrCtypeSpaceException::class);
        new RoutePath(' ');
    }

    public function testNotStarsWithSlash(): void
    {
        $this->expectException(StrNotStartsWithException::class);
        $this->expectExceptionMessage('not starts with /');
        new RoutePath('.');
    }

    public function testRelatives(): void
    {
        $this->expectException(StrContainsException::class);
        $this->expectExceptionMessage('contains ../');
        new RoutePath('/test/../');
    }

    public function testContainsDotSlash(): void
    {
        $this->expectException(StrContainsException::class);
        $this->expectExceptionMessage('contains ./');
        new RoutePath('/test/./');
    }

    public function testEndsWithSlash(): void
    {
        $this->expectException(StrEndsWithException::class);
        $this->expectExceptionMessage('ends with /');
        new RoutePath('/test/');
    }

    public function testContainsDoubleSlash(): void
    {
        $this->expectException(StrContainsException::class);
        $this->expectExceptionMessage('contains //');
        new RoutePath('/te//st');
    }

    public function testConstruct(): void
    {
        $path = '/test';
        $routePath = new RoutePath($path);
        $this->assertSame($path, $routePath->__toString());
    }
}
