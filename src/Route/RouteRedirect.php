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

use function Chevere\Message\message;
use Chevere\Nogatonga\Route\Interfaces\RouteInterface;
use Chevere\Nogatonga\Route\Traits\RouteTrait;
use Chevere\Throwable\Exceptions\LogicException;

final class RouteRedirect implements RouteInterface
{
    use RouteTrait;

    public function __construct(
        private RoutePath $path,
        private RoutePath $to
    ) {
        if ($path->__toString() === $to->__toString()) {
            throw new LogicException(
                message('Route redirect path cannot be the same as the destination path')
            );
        }
    }

    public function to(): RoutePath
    {
        return $this->to;
    }
}
