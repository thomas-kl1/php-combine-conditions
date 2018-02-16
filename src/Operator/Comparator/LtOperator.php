<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class LtOperator
 *
 * The LESS THAN:
 * The output is "true" if $expr1 is strictly less than $expr2.
 */
final class LtOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'lt';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return ($expr1 < $expr2);
    }
}
