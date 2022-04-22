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

use function Chevere\Danky\import;
use Chevere\Str\Str;

return function (string ...$links): string {
    $tags = "";
    foreach ($links as $href => $text) {
        $import = import('a', href: $href, text: $text);
        $tags .= <<<HTML
                    $import\n
        HTML;
    }
    $tags = (new Str($tags))
        ->withReplaceLast("\n", '')
        ->__toString();

    return <<<HTML
            <nav>
    $tags
            </nav>
    HTML;
};
