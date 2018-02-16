<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class NullOperator
 *
 * The NULL:
 * The output is "true" if $expression is null
 */
final class NullOperator extends AbstractCompareOne implements OperatorInterface
{
    const CODE = 'null';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expression): bool
    {
        return ($expression === null);
    }
}
