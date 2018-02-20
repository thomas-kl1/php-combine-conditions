<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class RegexpOperator
 *
 * The REGEXP:
 * The output is "true" if $expr2 match the $expr1 regex mask.
 */
final class RegexpOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'regexp';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return (bool) preg_match($expr1, $expr2);
    }
}
