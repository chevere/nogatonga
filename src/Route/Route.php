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

use Chevere\Filesystem\Interfaces\FilePhpReturnInterface;
use Chevere\Nogatonga\Route\Interfaces\RouteInterface;
use Chevere\Nogatonga\Route\Interfaces\RoutePathInterface;

final class Route implements RouteInterface
{
    public function __construct(
        private RoutePathInterface $path,
        private FilePhpReturnInterface $view,
        private array $data
    ) {
    }
}
