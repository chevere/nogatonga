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

function routes(array ...$array): array
{
    return [];
}

function route(
    string $path,
    string $view = '@',
    array $data = []
): array {
    return [];
}

function routeRedirect(string $path, string $to): array
{
    return [];
}
