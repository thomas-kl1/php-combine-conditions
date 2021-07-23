<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

/**
 * The EMPTY:
 * The output is "true" if $expression is empty
 */
final class EmptyOperator extends AbstractCompareOne
{
    public const CODE = 'empty';

    public function executeComparison(mixed $expression): bool
    {
        return empty($expression);
    }
}
