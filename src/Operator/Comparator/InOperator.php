<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

use function in_array;

/**
 * The IN:
 * The output is "true" if $expr1 is in list $expr2 after type juggling.
 */
final class InOperator extends AbstractCompareTwo
{
    public const CODE = 'in';

    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return in_array($expr1, $expr2, false);
    }
}
