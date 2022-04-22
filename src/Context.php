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

final class Context
{
    /**
     * @var Array<string, string> $nav
     * @var Array<string, mixed> $data
     */
    public function __construct(
        public readonly string $route,
        public readonly array $nav = [],
        public readonly array $data = [],
        public readonly string $lang = 'en',
    ) {
    }
}
