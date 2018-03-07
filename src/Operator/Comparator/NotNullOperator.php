<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class NotNullOperator
 *
 * The NULL:
 * The output is "true" if $expression is not null
 */
final class NotNullOperator extends AbstractCompareOne implements OperatorInterface
{
    public const CODE = 'notnull';

    /**
     * {@inheritdoc}
     */
    public function executeComparison($expression): bool
    {
        return ($expression !== null);
    }
}
