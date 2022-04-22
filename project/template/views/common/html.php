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

return function (
    string $head,
    string $body,
    string $lang = 'en'
): string {
    return <<<HTML
    <!DOCTYPE html>
    <html lang="$lang">
    $head
    $body
    </html>
    HTML;
};
