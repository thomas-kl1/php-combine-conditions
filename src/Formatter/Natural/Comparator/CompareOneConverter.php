<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Formatter\Natural\Comparator;

use InvalidArgumentException;
use LogicTree\Formatter\ConverterInterface;

use function var_export;

final class CompareOneConverter implements ConverterInterface
{
    public function __construct(private string $comparator) {}

    public function convert(mixed ...$expressions): string
    {
        $count = count($expressions);

        if ($count !== 1) {
            throw new InvalidArgumentException('1 expression expected, ' . $count . ' given.');
        }

        return var_export($expressions[0], true) . ' ' . $this->comparator;
    }
}
