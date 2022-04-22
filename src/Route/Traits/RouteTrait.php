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

namespace Chevere\Nogatonga\Route\Traits;

use Chevere\Nogatonga\Route\RoutePath;

trait RouteTrait
{
    private RoutePath $path;

    private string $name = '';

    public function path(): RoutePath
    {
        return $this->path;
    }

    public function withName(string $name): static
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }

    public function name(): string
    {
        return $this->name;
    }
}
