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

use Chevere\Nogatonga\Route\Interfaces\RoutePathInterface;
use Chevere\Nogatonga\Route\Interfaces\RouteRedirectInterface;

final class RouteRedirect implements RouteRedirectInterface
{
    use RouteTrait;

    public function __construct(
        private RoutePathInterface $path,
        private RoutePathInterface $to
    ) {
    }

    public function to(): RoutePathInterface
    {
        return $this->to;
    }
}
