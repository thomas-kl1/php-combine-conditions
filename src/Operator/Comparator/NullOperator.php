<?php
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

/**
 * The NULL:
 * The output is "true" if $expression is null
 */
final class NullOperator extends AbstractCompareOne
{
    public const CODE = 'null';

    public function executeComparison($expression): bool
    {
        return $expression === null;
    }
}
