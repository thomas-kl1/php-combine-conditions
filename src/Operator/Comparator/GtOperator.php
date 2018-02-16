<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class GtOperator
 *
 * The GREATER THAN:
 * The output is "true" if $expr1 is strictly greater than $expr2.
 */
final class GtOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'gt';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return ($expr1 > $expr2);
    }
}
