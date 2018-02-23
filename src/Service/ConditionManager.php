<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Service;

use LogicTree\Model\NodeInterface;
use LogicTree\Model\ConditionInterface;
use LogicTree\Model\CombineInterface;
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
     * @param \LogicTree\Model\NodeInterface $node
     * @param \LogicTree\Model\DataSource $dataSource
     * @return bool
     */
    public function execute(NodeInterface $node, DataSource $dataSource): bool
    {
        $result = null;

        if (!($node instanceof NodeInterface)) {
            throw new \LogicException(get_class($node) . ' must implement ' . NodeInterface::class . '.');
        } elseif ($node instanceof CombineInterface) {
            $result = $this->executeCombine($node, $dataSource);
        } elseif ($node instanceof ConditionInterface) {
            $result = $this->executeCondition($node, $dataSource->getValue($node->getValueIdentifier()));
        }

        return $result;
    }

    /**
     * Execute the combination of conditions expressions
     *
     * @param \LogicTree\Model\CombineInterface $combine
     * @param \LogicTree\Model\DataSource $dataSource
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
     * @param \LogicTree\Model\ConditionInterface $condition
     * @param mixed $value
     * @return bool
     */
    private function executeCondition(ConditionInterface $condition, mixed $value): bool
    {
        $operator = $this->operatorPool->getOperator(OperatorPool::TYPE_COMPARATOR, $condition->getOperator());

        return $operator->execute($condition->getValueCompare(), $value);
    }
}
