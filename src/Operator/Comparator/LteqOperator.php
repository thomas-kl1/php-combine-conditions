<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

/**
 * The LESS THAN EQUAL:
 * The output is "true" if $expr1 is less than or equal to $expr2.
 */
final class LteqOperator extends AbstractCompareTwo
{
    public const CODE = 'lteq';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 <= $expr2;
    }
}
