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
use Chevere\Nogatonga\Context;

return function (string $main, Context $context): string {
    $header = import('header', navbar: $context->navbar);
    $footer = import('footer');
    $head = import('head');
    $body = import(
        'body',
        body: <<<HTML
        $header
            <main>$main</main>
        $footer
        HTML,
    );

    return import(
        'html',
        head: $head,
        body: $body,
        bind: $context->bind,
        lang: $context->lang
    );
};
