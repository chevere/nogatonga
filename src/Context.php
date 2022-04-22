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

use Chevere\Nogatonga\Route\Interfaces\RouteInterface;

final class Context
{
    /**
     * @var Array<string, string> $nav
     * @var Array<string, mixed> $data
     */
    public function __construct(
        public RouteInterface $route,
        public array $nav = [],
        public array $data = [],
        public string $lang = 'en',
    ) {
    }

    public function route(): RouteInterface
    {
        return $this->route;
    }

    public function nav(): array
    {
        return $this->nav;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function lang(): string
    {
        return $this->lang;
    }
}
