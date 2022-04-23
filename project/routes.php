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

use function Chevere\Nogatonga\route;
use function Chevere\Nogatonga\routeRedirect;
use function Chevere\Nogatonga\routes;

return routes(
    home: route(
        path: '/',
        view: 'home',
    ),
    about: route(
        path: '/about',
    ),
    tos: routeRedirect(
        '/tos',
        '/about'
    ),
);
