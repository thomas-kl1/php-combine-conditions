<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

/**
 * The LESS THAN:
 * The output is "true" if $expr1 is strictly less than $expr2.
 */
final class LtOperator extends AbstractCompareTwo
{
    public const CODE = 'lt';

    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return $expr1 < $expr2;
    }
}
