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

namespace Chevere\Nogatonga;

use function Chevere\Filesystem\filePhpReturnForPath;
use Chevere\Nogatonga\Route\Interfaces\RouteInterface;
use Chevere\Nogatonga\Route\Route;
use Chevere\Nogatonga\Route\RoutePath;
use Chevere\Nogatonga\Route\RouteRedirect;

function routes(RouteInterface ...$route): array
{
    return [];
}

function route(
    string $path,
    string $view = '@',
    array $data = []
): RouteInterface {
    return new Route(
        path: new RoutePath($path),
        view: filePhpReturnForPath($view),
        data: $data
    );
}

function routeRedirect(string $path, string $to): RouteInterface
{
    return new RouteRedirect(
        path: new RoutePath($path),
        to: new RoutePath($to),
    );
}
