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

use Chevere\Danky\Import;
use Chevere\Danky\Template;
use Chevere\Filesystem\Interfaces\DirInterface;
use Chevere\Nogatonga\Route\Interfaces\RouteInterface;
use Chevere\Nogatonga\Route\Route;
use Chevere\Nogatonga\Route\RoutePath;
use Chevere\Nogatonga\Route\RouteRedirect;
use Chevere\Nogatonga\Route\Routes;

function routes(RouteInterface ...$routes): Routes
{
    return new Routes(...$routes);
}

function route(
    string $path,
    string $view = '',
): Route {
    return new Route(
        path: new RoutePath($path),
        view: $view,
    );
}

function routeRedirect(string $path, string $to): RouteInterface
{
    return new RouteRedirect(
        path: new RoutePath($path),
        to: new RoutePath($to),
    );
}

function loadView(
    DirInterface $dir,
    Route $route,
): Template {
    $view = $route->view();
    if ($view === '') {
        $view = $route->name();
    }
    $importPath = new Import(
        path: $view,
        dir: $dir
    );

    return new Template($importPath->file());
}
