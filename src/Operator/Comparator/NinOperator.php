<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class NinOperator
 *
 * The NIN:
 * The output is "true" if $expr1 is not in list $expr2 after type juggling.
 */
final class NinOperator extends AbstractCompareTwo implements OperatorInterface
{
    public const CODE = 'nin';

    /**
     * {@inheritdoc}
     */
    public function executeComparison($expr1, $expr2): bool
    {
        return !in_array($expr1, $expr2);
    }
}
