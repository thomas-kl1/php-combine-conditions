<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class AbstractCompareOne
 */
abstract class AbstractCompareOne implements OperatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);

        if ($count != 1) {
            throw new \InvalidArgumentException('1 expression expected, ' . $count . ' given.');
        }

        return $this->executeComparison($expressions[1]);
    }

    /**
     * Execute the comparison for the expression
     *
     * @param mixed $expression
     * @return bool
     */
    abstract public function executeComparison(mixed $expression): bool;
}
