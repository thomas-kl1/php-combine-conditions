<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class AbstractCompareTwo
 */
abstract class AbstractCompareTwo implements OperatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);

        if ($count != 2) {
            throw new \InvalidArgumentException('2 expressions expected, ' . $count . ' given.');
        }

        return $this->executeComparison($expressions[1], $expressions[2]);
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
