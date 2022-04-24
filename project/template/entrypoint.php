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
use function Chevere\Nogatonga\bind;
use Chevere\Nogatonga\Context;

require __DIR__ . '/../../vendor/autoload.php';

echo import(
    'views/home',
    context: new Context(
        bind: bind('/'),
        navbar: include __DIR__ . '/../data/navbar.php',
        data: include __DIR__ . '/../data/data.php',
        lang: 'es'
    )
);
