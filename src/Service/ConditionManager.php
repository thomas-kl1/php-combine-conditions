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
use LogicTree\Node\NodeResult;
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

    public function execute(NodeInterface $node, DataSource $dataSource): NodeResult
    {
        return match (true) {
            $node instanceof CombineInterface => $this->executeCombine($node, $dataSource),
            $node instanceof ConditionInterface => $this->executeCondition($node, $dataSource),
            default => new NodeResult(true)
        };
    }

    private function executeCombine(CombineInterface $combine, DataSource $dataSource): NodeResult
    {
        $children = array_map(
            fn(NodeInterface $node) => $this->execute($node, $dataSource),
            $combine->getChildren()
        );

        $isMatched = $this
            ->resolveOperator(OperatorType::Logical, $combine)
            ->execute(
                ...array_map(
                    fn(NodeResult $nodeResult) => $nodeResult->isMatched(),
                    $children
                )
            );

        return new NodeResult(
            matched: $combine->isInvert() xor $isMatched,
            node: $combine,
            children: $children
        );
    }

    private function executeCondition(ConditionInterface $condition, DataSource $dataSource): NodeResult
    {
        $firstValue = $condition->getFirstValue();
        $firstValueIdentifier = $condition->getFirstValueIdentifier();
        $secondValue = $condition->getSecondValue();
        $secondValueIdentifier = $condition->getSecondValueIdentifier();

        if(is_null($firstValue) && !is_null($firstValueIdentifier)) {
            $firstValue = $dataSource->getValue($firstValueIdentifier);
            $condition->setFirstValue($firstValue);
        }
        if(is_null($secondValue) && !is_null($secondValueIdentifier)) {
            $secondValue = $dataSource->getValue($secondValueIdentifier);
            $condition->setSecondValue($secondValue);
        }

        $result = $this
            ->resolveOperator(OperatorType::Comparator, $condition)
            ->execute($firstValue, $secondValue);

        return new NodeResult(
            matched: $result,
            node: $condition
        );
    }

    private function resolveOperator(OperatorType $type, NodeInterface $node): OperatorInterface
    {
        return $this->operatorPool->getOperator($type, $node->getOperator());
    }
}
