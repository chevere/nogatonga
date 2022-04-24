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

use Chevere\Nogatonga\Route;
use Chevere\Str\Exceptions\StrContainsException;
use Chevere\Str\Exceptions\StrCtypeSpaceException;
use Chevere\Str\Exceptions\StrEmptyException;
use Chevere\Str\Exceptions\StrEndsWithException;
use Chevere\Str\Exceptions\StrNotStartsWithException;
use PHPUnit\Framework\TestCase;

final class RouteTest extends TestCase
{
    public function testEmpty(): void
    {
        $this->expectException(StrEmptyException::class);
        new Route('');
    }

    public function testSpaces(): void
    {
        $this->expectException(StrCtypeSpaceException::class);
        new Route(' ');
    }

    public function testNotStarsWithSlash(): void
    {
        $this->expectException(StrNotStartsWithException::class);
        $this->expectExceptionMessage('not starts with /');
        new Route('.');
    }

    public function testRelatives(): void
    {
        $this->expectException(StrContainsException::class);
        $this->expectExceptionMessage('contains ../');
        new Route('/test/../');
    }

    public function testContainsDotSlash(): void
    {
        $this->expectException(StrContainsException::class);
        $this->expectExceptionMessage('contains ./');
        new Route('/test/./');
    }

    public function testEndsWithSlash(): void
    {
        $this->expectException(StrEndsWithException::class);
        $this->expectExceptionMessage('ends with /');
        new Route('/test/');
    }

    public function testContainsDoubleSlash(): void
    {
        $this->expectException(StrContainsException::class);
        $this->expectExceptionMessage('contains //');
        new Route('/te//st');
    }

    public function testConstruct(): void
    {
        $path = '/test';
        $routePath = new Route($path);
        $this->assertSame($path, $routePath->__toString());
    }
}
