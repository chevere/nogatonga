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

namespace Chevere\Nogatonga\Interfaces;

use Chevere\Nogatonga\Route;

interface BindInterface
{
    public function route(): Route;

    public function withName(string $name): BindInterface;

    public function name(): string;
}
