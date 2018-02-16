<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
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
    const CODE = 'empty';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expression): bool
    {
        return empty($expression);
    }
}
