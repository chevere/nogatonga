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
use function Chevere\Message\message;
use Chevere\Nogatonga\Route\Interfaces\RouteInterface;
use Chevere\Throwable\Exceptions\OverflowException;
use Ds\Map as DsMap;

final class Routes implements MappedInterface, ToArrayInterface
{
    use MapTrait;
    use MapToArrayTrait;

    /** @var DsMap<string, string> */
    private DsMap $paths;

    public function __construct(RouteInterface ...$routes)
    {
        $this->map = new Map();
        $this->paths = new DsMap();
        foreach ($routes as $name => $route) {
            $path = $route->path()->__toString();
            $this->assertNoPathCollision($path);
            $this->paths[$path] = $name;
            $name = strval($name);
            $route = $route->withName($name);
            $this->map = $this->map->withPut($name, $route);
        }
    }

    private function assertNoPathCollision(string $path): void
    {
        if (!$this->paths->hasKey($path)) {
            return;
        }

        throw new OverflowException(
            message('Path %path% has been already registered by route %routeName%')
                ->code('%path%', $path)
                ->code('%routeName%', $this->paths->get($path))
        );
    }
}
