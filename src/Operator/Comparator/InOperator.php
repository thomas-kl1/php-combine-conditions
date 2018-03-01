<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class InOperator
 *
 * The IN:
 * The output is "true" if $expr1 is in list $expr2 after type juggling.
 */
final class InOperator extends AbstractCompareTwo implements OperatorInterface
{
    public const CODE = 'in';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return in_array($expr1, $expr2);
    }
}
