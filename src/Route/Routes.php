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

use Chevere\Common\Interfaces\ToArrayInterface;
use Chevere\DataStructure\Interfaces\MappedInterface;
use Chevere\DataStructure\Map;
use Chevere\DataStructure\Traits\MapToArrayTrait;
use Chevere\DataStructure\Traits\MapTrait;
use Chevere\Nogatonga\Route\Interfaces\RouteInterface;

final class Routes implements MappedInterface, ToArrayInterface
{
    use MapTrait;
    use MapToArrayTrait;

    public function __construct(RouteInterface ...$routes)
    {
        $this->map = new Map();
        foreach ($routes as $name => $route) {
            $name = strval($name);
            $route = $route->withName($name);
            $this->map = $this->map->withPut($name, $route);
        }
    }
}
