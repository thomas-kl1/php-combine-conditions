<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class NinIdenOperator
 *
 * The NIN IDENTICAL:
 * The output is "true" if $expr1 is not in list $expr2, and they are of the same type.
 */
final class NinIdenOperator extends AbstractCompareTwo implements OperatorInterface
{
    public const CODE = 'iniden';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return !in_array($expr1, $expr2, true);
    }
}
