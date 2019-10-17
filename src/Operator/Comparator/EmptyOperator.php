<?php
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

/**
 * The EMPTY:
 * The output is "true" if $expression is empty
 */
final class EmptyOperator extends AbstractCompareOne
{
    public const CODE = 'empty';

    public function executeComparison($expression): bool
    {
        return empty($expression);
    }
}
