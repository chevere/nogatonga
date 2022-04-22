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

/**
 * @param Array<string, Array<string, string>> $main
 */
return function (string $main, Context $context): string {
    $header = import('header', nav: $context->nav);
    $footer = import('footer');
    $head = import('head');
    $body = import(
        'body',
        body: <<<HTML
        $header
            <main>$main</main>
        $footer
        HTML,
        route: $context->route
    );

    return import(
        'html',
        head: $head,
        body: $body,
        lang: $context->lang
    );
};
