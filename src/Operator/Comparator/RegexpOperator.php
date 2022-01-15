<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

use function preg_match;

/**
 * The REGEXP:
 * The output is "true" if $expr2 match the $expr1 regex mask.
 */
final class RegexpOperator extends AbstractCompareTwo
{
    public const CODE = 'regexp';

    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return preg_match($expr2, $expr1) !== false;
    }
}
