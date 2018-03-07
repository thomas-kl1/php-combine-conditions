<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
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

        return $this->executeComparison($expressions[0], $expressions[1]);
    }

    /**
     * Execute the comparison for expressions
     *
     * @param mixed $expr1
     * @param mixed $expr2
     * @return bool
     */
    abstract public function executeComparison($expr1, $expr2): bool;
}
