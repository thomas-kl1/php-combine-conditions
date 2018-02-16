<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class IdenOperator
 *
 * The IDENTICAL:
 * The output is "true" if $expr1 is equal to $expr2, and they are of the same type.
 */
final class IdenOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'iden';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return ($expr1 === $expr2);
    }
}
