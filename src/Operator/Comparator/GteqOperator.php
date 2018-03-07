<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
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
    public const CODE = 'gteq';

    /**
     * {@inheritdoc}
     */
    public function executeComparison($expr1, $expr2): bool
    {
        return ($expr1 >= $expr2);
    }
}
