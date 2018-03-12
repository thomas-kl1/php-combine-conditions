<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Service;

use LogicTree\DataSource;
use LogicTree\Node\CombineInterface;
use LogicTree\Node\ConditionInterface;
use LogicTree\Node\NodeInterface;
use LogicTree\Operator\OperatorPool;

/**
 * Class ConditionManager
 * @api
 */
class ConditionManager
{
    /**
     * Operator Pool
     *
     * @var \LogicTree\Operator\OperatorPool
     */
    private $operatorPool;

    /**
     * Combine Condition Manager constructor
     *
     * @param \LogicTree\Operator\OperatorPool|null $operatorPool
     */
    public function __construct(?OperatorPool $operatorPool = null)
    {
        $this->operatorPool = ($operatorPool === null) ? new OperatorPool() : $operatorPool;
    }

    /**
     * Execute the logic tree structure conditions
     *
     * ToDo: /!\ Unknown Nodes are not processed yet and are ignored. Default result is 'true'. /!\
     *
     * @param \LogicTree\Node\NodeInterface $node
     * @param \LogicTree\DataSource $dataSource
     * @return bool
     */
    public function execute(NodeInterface $node, DataSource $dataSource): bool
    {
        $result = true;

        if ($node instanceof CombineInterface) {
            $result = $this->executeCombine($node, $dataSource);
        } elseif ($node instanceof ConditionInterface) {
            $result = $this->executeCondition($node, $dataSource->getValue($node->getValueIdentifier()));
        }

        return $result;
    }

    /**
     * Execute the combination of conditions expressions
     *
     * @param \LogicTree\Node\CombineInterface $combine
     * @param \LogicTree\DataSource $dataSource
     * @return bool
     */
    private function executeCombine(CombineInterface $combine, DataSource $dataSource): bool
    {
        $operator = $this->operatorPool->getOperator(OperatorPool::TYPE_LOGICAL, $combine->getOperator());
        $expressions = [];

        foreach ($combine->getChildren() as $child) {
            $expressions[] = $this->execute($child, $dataSource);
        }

        return ($combine->isInvert() xor $operator->execute(...$expressions));
    }

    /**
     * Execute the condition expression
     *
     * @param \LogicTree\Node\ConditionInterface $condition
     * @param mixed $value
     * @return bool
     */
    private function executeCondition(ConditionInterface $condition, $value): bool
    {
        $operator = $this->operatorPool->getOperator(OperatorPool::TYPE_COMPARATOR, $condition->getOperator());

        return $operator->execute($value, $condition->getValueCompare());
    }
}
