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

return function (string $href, string $text, string $page): string {
    return <<<HTML
    <a data-page="$page" href="$href">$text</a>
    HTML;
};
