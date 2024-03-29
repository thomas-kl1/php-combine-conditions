<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

/**
 * The NULL:
 * The output is "true" if $expression is not null
 */
final class NotNullOperator extends AbstractCompareOne
{
    public const CODE = 'notnull';

    public function executeComparison(mixed $expression): bool
    {
        return $expression !== null;
    }
}
