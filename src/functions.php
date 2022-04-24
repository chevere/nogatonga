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

use function Chevere\Danky\callerDir;
use Chevere\Danky\Import;
use Chevere\Danky\Template;
use Chevere\Filesystem\Interfaces\DirInterface;
use Chevere\Nogatonga\Interfaces\BindInterface;

function binding(BindInterface ...$binds): Binding
{
    foreach ($binds as $name => &$bind) {
        $name = strval($name);
        $bind = $bind->withName($name);
        if ($bind instanceof Bind) {
            $view = $bind->view();
            if ($view === '') {
                $bind = $bind->withView($name);
            }
        }
    }

    return new Binding(callerDir(), ...$binds);
}

/**
 * @param string $route An absolute URL path
 * @param string $view View name relative to ./template/views/
 */
function bind(
    string $route,
    string $view = '',
): Bind {
    return new Bind(
        route: new Route($route),
        view: $view,
    );
}

function bindRedirect(string $route, string $to): BindInterface
{
    return new BindRedirect(
        route: new Route($route),
        to: new Route($to),
    );
}

function loadView(
    DirInterface $viewsDir,
    Bind $bind,
): Template {
    $importPath = new Import(
        path: $bind->view(),
        dir: $viewsDir,
    );

    return new Template($importPath->file());
}

function build(DirInterface $project, DirInterface $target): void
{
    $project->createIfNotExists();
    if ($target->exists()) {
        $target->remove();
    }
    $target->create();
}
