<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

use function in_array;

/**
 * The NIN:
 * The output is "true" if $expr1 is not in list $expr2 after type juggling.
 */
final class NinOperator extends AbstractCompareTwo
{
    public const CODE = 'nin';

    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return !in_array($expr1, $expr2, false);
    }
}
