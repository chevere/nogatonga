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

use Chevere\Str\StrAssert;
use Stringable;

final class RoutePath implements Stringable
{
    public function __construct(private string $path)
    {
        $assert = new StrAssert($path);
        $assert
            ->notEmpty()
            ->notCtypeSpace()
            ->notContains('\\')
            ->notContains('//')
            ->startsWith('/')
            ->notContains('../')
            ->notContains('./');
        if (strlen($path) > 1) {
            $assert->notEndsWith('/');
        }
    }

    public function __toString(): string
    {
        return $this->path;
    }
}
