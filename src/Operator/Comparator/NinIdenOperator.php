<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

use function in_array;

/**
 * The NIN IDENTICAL:
 * The output is "true" if $expr1 is not in list $expr2, and they are of the same type.
 */
final class NinIdenOperator extends AbstractCompareTwo
{
    public const CODE = 'niniden';

    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return !in_array($expr1, $expr2, true);
    }
}
