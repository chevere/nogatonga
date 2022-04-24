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

use Chevere\Nogatonga\Interfaces\BindInterface;

final class Context
{
    /**
     * @var Array<string, string> $navbar
     * @var Array<string, mixed> $data
     */
    public function __construct(
        public BindInterface $bind,
        public array $navbar = [],
        public array $data = [],
        public string $lang = 'en',
    ) {
    }

    public function bind(): BindInterface
    {
        return $this->bind;
    }

    public function navbar(): array
    {
        return $this->navbar;
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
