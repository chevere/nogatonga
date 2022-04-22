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

namespace Chevere\Nogatonga\Route;

use Chevere\Nogatonga\Route\Interfaces\RouteInterface;
use Chevere\Nogatonga\Route\Interfaces\RoutePathInterface;

trait RouteTrait
{
    private RoutePathInterface $path;

    private string $name;

    public function path(): RoutePathInterface
    {
        return $this->path;
    }
    
    public function withName(string $name): RouteInterface
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
