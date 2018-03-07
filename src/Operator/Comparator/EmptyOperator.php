<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class EmptyOperator
 *
 * The EMPTY:
 * The output is "true" if $expression is empty
 */
final class EmptyOperator extends AbstractCompareOne implements OperatorInterface
{
    public const CODE = 'empty';

    /**
     * {@inheritdoc}
     */
    public function executeComparison($expression): bool
    {
        return empty($expression);
    }
}
