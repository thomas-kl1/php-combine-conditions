<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class GteqOperator
 *
 * The GREATER THAN EQUAL:
 * The output is "true" if $expr1 is greater than or equal to $expr2.
 */
final class GteqOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'gteq';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return ($expr1 >= $expr2);
    }
}
