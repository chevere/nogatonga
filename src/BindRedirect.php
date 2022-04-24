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

use function Chevere\Message\message;
use Chevere\Nogatonga\Interfaces\BindInterface;
use Chevere\Nogatonga\Traits\BindTrait;
use Chevere\Throwable\Exceptions\LogicException;

final class BindRedirect implements BindInterface
{
    use BindTrait;

    public function __construct(
        private Route $route,
        private Route $to
    ) {
        if ($route->__toString() === $to->__toString()) {
            throw new LogicException(
                message('Route redirect path cannot be the same as the destination path')
            );
        }
    }

    public function to(): Route
    {
        return $this->to;
    }
}
