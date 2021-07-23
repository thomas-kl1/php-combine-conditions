<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

/**
 * The IDENTICAL:
 * The output is "true" if $expr1 is equal to $expr2, and they are of the same type.
 */
final class IdenOperator extends AbstractCompareTwo
{
    public const CODE = 'iden';

    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return $expr1 === $expr2;
    }
}
