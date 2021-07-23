<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

/**
 * The EQUAL:
 * The output is "true" if $expr1 is equal to $expr2 after type juggling.
 */
final class EqOperator extends AbstractCompareTwo
{
    public const CODE = 'eq';

    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return $expr1 == $expr2;
    }
}
