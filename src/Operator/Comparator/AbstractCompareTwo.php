<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Comparator;

use InvalidArgumentException;
use LogicTree\Operator\OperatorInterface;
use function count;

abstract class AbstractCompareTwo implements OperatorInterface
{
    public function execute(mixed ...$expressions): bool
    {
        $count = count($expressions);

        if ($count !== 2) {
            throw new InvalidArgumentException('2 expressions expected, ' . $count . ' given.');
        }

        return $this->executeComparison($expressions[0], $expressions[1]);
    }

    /**
     * Execute the comparison for expressions
     *
     * @param mixed $expr1
     * @param mixed $expr2
     * @return bool
     */
    abstract public function executeComparison(mixed $expr1, mixed $expr2): bool;
}
