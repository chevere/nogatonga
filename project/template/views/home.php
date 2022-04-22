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

return function (Context $context): string {
    return import(
        'common/page',
        main: 'HoMePaGe',
        context: $context
    );
};
