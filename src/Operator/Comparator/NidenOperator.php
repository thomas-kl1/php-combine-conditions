<?php
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

/**
 * The NOT IDENTICAL:
 * The output is "true" if $expr1 is not equal to $expr2, or they are not of the same type.
 */
final class NidenOperator extends AbstractCompareTwo
{
    public const CODE = 'niden';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 !== $expr2;
    }
}
