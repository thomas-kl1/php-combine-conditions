<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Service;

use LogicTree\Model\Combine;
use LogicTree\Model\Condition;
use LogicTree\Model\ConditionInterface;
use LogicTree\Resolver\Operator\ComparatorOperatorResolver;
use LogicTree\Resolver\Operator\LogicalOperatorResolver;

/**
 * Class ConditionManager
 * @api
 */
class ConditionManager
{
    /**
     * @var \LogicTree\Resolver\Operator\ComparatorOperatorResolver
     */
    private $comparatorOperatorResolver;

    /**
     * @var \LogicTree\Resolver\Operator\LogicalOperatorResolver
     */
    private $logicalOperatorResolver;

    /**
     * ConditionManager Constructor
     */
    public function __construct()
    {
        $this->comparatorOperatorResolver = ComparatorOperatorResolver::getInstance();
        $this->logicalOperatorResolver = LogicalOperatorResolver::getInstance();
    }

    /**
     * Execute the logic tree structure conditions
     *
     * @param \LogicTree\Model\ConditionInterface $condition
     * @param array $dataSource
     * @return bool
     */
    public function execute(ConditionInterface $condition, array $dataSource): bool
    {
        $result = null;

        if ($condition instanceof Combine) {
            $result = $this->executeCombine($condition, $dataSource);
        } elseif ($condition instanceof Condition) {
            $result = $this->executeCondition($condition, $dataSource[$condition->getValueIdentifier()]);
        } else {
            throw new \LogicException(
                get_class($condition) . ' must implement ' . Combine::class . ' or ' . Condition::class
            );
        }

        return $result;
    }

    /**
     * Execute the combination of conditions expressions
     *
     * @param \LogicTree\Model\Combine $combine
     * @param array $dataSource
     * @return bool
     */
    private function executeCombine(Combine $combine, array $dataSource): bool
    {
        $operator = $this->logicalOperatorResolver->resolve($combine->getOperator());
        $expressions = [];

        foreach ($combine as $condition) {
            $expressions[] = $this->execute($condition, $dataSource);
        }

        return ($combine->isInvert() xor $operator->execute(...$expressions));
    }

    /**
     * Execute the condition expression
     *
     * @param \LogicTree\Model\Condition $condition
     * @param mixed $value
     * @return bool
     */
    private function executeCondition(Condition $condition, $value): bool
    {
        $operator = $this->comparatorOperatorResolver->resolve($condition->getOperator());

        return $operator->execute($condition->getValueCompare(), $value);
    }
}
