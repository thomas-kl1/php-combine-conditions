<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Service;

use LogicTree\DataSource;
use LogicTree\Node\CombineInterface;
use LogicTree\Node\ConditionInterface;
use LogicTree\Node\NodeInterface;
use LogicTree\Operator\OperatorInterface;
use LogicTree\Operator\OperatorPool;
use LogicTree\Operator\OperatorType;

use function array_map;

/**
 * @api
 */
class ConditionManager
{
    public function __construct(private OperatorPool $operatorPool) {}

    public function execute(CombineInterface|ConditionInterface $node, DataSource $dataSource): bool
    {
        return match (true) {
            $node instanceof CombineInterface => $this->executeCombine($node, $dataSource),
            $node instanceof ConditionInterface => $this->executeCondition($node, $dataSource)
        };
    }

    private function executeCombine(CombineInterface $combine, DataSource $dataSource): bool
    {
        return $combine->isInvert() xor $this->resolveOperator(OperatorType::Logical, $combine)->execute(
            ...array_map(fn (NodeInterface $node) => $this->execute($node, $dataSource), $combine->getChildren())
        );
    }

    private function executeCondition(ConditionInterface $condition, DataSource $dataSource): bool
    {
        return $this->resolveOperator(OperatorType::Comparator, $condition)->execute(
            $dataSource->getValue($condition->getValueIdentifier()),
            $condition->getValueCompare()
        );
    }

    private function resolveOperator(OperatorType $type, NodeInterface $node): OperatorInterface
    {
        return $this->operatorPool->getOperator($type, $node->getOperator());
    }
}
