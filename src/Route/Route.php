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
use Chevere\Nogatonga\Route\Traits\RouteTrait;

final class Route implements RouteInterface
{
    use RouteTrait;

    private FilePhpReturnInterface $template;

    /**
     * @param Array<string, mixed> $data
     */
    public function __construct(
        private RoutePath $path,
        private string $view,
        private array $data
    ) {
    }

    public function view(): string
    {
        return $this->view;
    }

    public function data(): array
    {
        return $this->data;
    }
}
