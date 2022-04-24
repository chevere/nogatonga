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

use Chevere\Nogatonga\Bind;

return function (
    string $head,
    string $body,
    Bind $bind,
    string $lang = 'en'
): string {
    $name = $bind->name();
    $route = $bind->route();
    $view = $bind->view();

    return <<<HTML
    <!DOCTYPE html>
    <html lang="$lang" data-page="$name" data-route="$route" data-view="$view">
    $head
    $body
    </html>
    HTML;
};
