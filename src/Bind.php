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
use Chevere\Nogatonga\Traits\BindTrait;

final class Bind implements BindInterface
{
    use BindTrait;

    public function __construct(
        private Route $route,
        private string $view,
    ) {
    }

    public function withView(string $view): Bind
    {
        $new = clone $this;
        $new->view = $view;

        return $new;
    }

    public function view(): string
    {
        return $this->view;
    }
}
