<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class NidenOperator
 *
 * The NOT IDENTICAL:
 * The output is "true" if $expr1 is not equal to $expr2, or they are not of the same type.
 */
final class NidenOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'niden';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return ($expr1 !== $expr2);
    }
}
