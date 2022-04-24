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

use Chevere\Common\Interfaces\ToArrayInterface;
use Chevere\DataStructure\Interfaces\MappedInterface;
use Chevere\DataStructure\Map;
use Chevere\DataStructure\Traits\MapToArrayTrait;
use Chevere\DataStructure\Traits\MapTrait;
use Chevere\Filesystem\Interfaces\DirInterface;
use function Chevere\Message\message;
use Chevere\Nogatonga\Interfaces\BindInterface;
use Chevere\Throwable\Exceptions\OverflowException;
use Ds\Map as DsMap;
use Iterator;

final class Binding implements MappedInterface, ToArrayInterface
{
    use MapTrait;
    use MapToArrayTrait;

    /** @var DsMap<string, string> /path -> name */
    private DsMap $routes;

    public function __construct(
        private DirInterface $dir,
        BindInterface ...$binds
    ) {
        $dir->assertExists();
        $this->map = new Map();
        $this->routes = new DsMap();
        foreach ($binds as $name => $bind) {
            $name = strval($name);
            $path = $bind->route()->__toString();
            $this->assertNoPathCollision($path);
            $this->routes[$path] = $name;
            $this->map = $this->map->withPut($name, $bind);
        }
    }

    /**
     * @return Iterator<string, BindInterface>
     */
    public function getIterator(): Iterator
    {
        return $this->map->getIterator();
    }

    private function assertNoPathCollision(string $path): void
    {
        if (!$this->routes->hasKey($path)) {
            return;
        }

        throw new OverflowException(
            message('Path %path% has been already registered by route %routeName%')
                ->code('%path%', $path)
                ->code('%routeName%', $this->routes->get($path))
        );
    }
}
