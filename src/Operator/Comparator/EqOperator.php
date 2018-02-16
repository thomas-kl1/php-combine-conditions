<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class EqOperator
 *
 * The EQUAL:
 * The output is "true" if $expr1 is equal to $expr2 after type juggling.
 */
final class EqOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'eq';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return ($expr1 == $expr2);
    }
}
