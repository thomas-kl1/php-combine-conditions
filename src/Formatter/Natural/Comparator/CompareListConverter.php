<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Formatter\Natural\Comparator;

use InvalidArgumentException;
use LogicTree\Formatter\ConverterInterface;

use function var_export;

final class CompareListConverter implements ConverterInterface
{
    public function __construct(private string $comparator) {}

    public function convert(mixed ...$expressions): string
    {
        $count = count($expressions);

        if ($count !== 2) {
            throw new InvalidArgumentException('2 expressions expected, ' . $count . ' given.');
        }

        [$expr1, $expr2] = $expressions;

        return var_export($expr1, true) . ' ' . $this->comparator . ' (' . var_export($expr2, true) . ')';
    }
}
