<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Service;

use LogicTree\Model\AbstractModel;
use LogicTree\Model\Condition;
use LogicTree\Model\ConditionInterface;
use LogicTree\Model\DataSource;
use LogicTree\Operator\OperatorPool;

/**
 * Class ConditionManager
 * @api
 */
class ConditionManager
{
    /**
     * @var \LogicTree\Operator\OperatorPool
     */
    private $operatorPool;

    /**
     * @param \LogicTree\Operator\OperatorPool|null $operatorPool
     */
    public function __construct(OperatorPool $operatorPool = null)
    {
        if ($operatorPool === null) {
            $this->operatorPool = new OperatorPool();
        }
    }

    /**
     * Execute the logic tree structure conditions
     *
     * @param \LogicTree\Model\ConditionInterface $condition
     * @param \LogicTree\Model\DataSource $dataSource
     * @return bool
     */
    public function execute(ConditionInterface $condition, DataSource $dataSource): bool
    {
        $result = null;

        if ($condition instanceof Combine) {
            $result = $this->executeCombine($condition, $dataSource);
        } elseif ($condition instanceof Condition) {
            $result = $this->executeCondition($condition, $dataSource->getValue($condition->getValueIdentifier()));
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
     * @param \LogicTree\Model\DataSource $dataSource
     * @return bool
     */
    private function executeCombine(Combine $combine, DataSource $dataSource): bool
    {
        $operator = $this->operatorPool->getOperator(OperatorPool::TYPE_LOGICAL, $combine->getOperator());
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
    private function executeCondition(Condition $condition, mixed $value): bool
    {
        $operator = $this->operatorPool->getOperator(OperatorPool::TYPE_COMPARATOR, $condition->getOperator());

        return $operator->execute($condition->getValueCompare(), $value);
    }
}
