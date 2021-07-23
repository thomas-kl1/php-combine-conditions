<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

use InvalidArgumentException;
use LogicTree\Operator\OperatorInterface;
use function count;

abstract class AbstractCompareOne implements OperatorInterface
{
    public function execute(mixed ...$expressions): bool
    {
        $count = count($expressions);

        if ($count !== 1) {
            throw new InvalidArgumentException('1 expression expected, ' . $count . ' given.');
        }

        return $this->executeComparison($expressions[0]);
    }

    /**
     * Execute the comparison for the expression
     *
     * @param mixed $expression
     * @return bool
     */
    abstract public function executeComparison(mixed $expression): bool;
}
