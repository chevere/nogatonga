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
use Chevere\Nogatonga\Route\Traits\RouteTrait;

final class Route implements RouteInterface
{
    use RouteTrait;

    public function __construct(
        private RoutePath $path,
        private string $view,
    ) {
    }

    public function view(): string
    {
        return $this->view;
    }
}
