<?php
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

/**
 * The GREATER THAN:
 * The output is "true" if $expr1 is strictly greater than $expr2.
 */
final class GtOperator extends AbstractCompareTwo
{
    public const CODE = 'gt';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 > $expr2;
    }
}
