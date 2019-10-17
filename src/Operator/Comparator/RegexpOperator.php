<?php
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use function preg_match;

/**
 * The REGEXP:
 * The output is "true" if $expr2 match the $expr1 regex mask.
 */
final class RegexpOperator extends AbstractCompareTwo
{
    public const CODE = 'regexp';

    public function executeComparison($expr1, $expr2): bool
    {
        return (bool) preg_match($expr1, $expr2);
    }
}
