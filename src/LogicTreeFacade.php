<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree;

use LogicTree\Node\NodeInterface;
use LogicTree\Node\NodeResult;
use LogicTree\Operator\OperatorInterface;
use LogicTree\Operator\OperatorPool;
use LogicTree\Operator\OperatorType;
use LogicTree\Service\ConditionManager;

class LogicTreeFacade
{
    public function __construct(
        private ?ConditionManager $conditionManager = null,
        private ?OperatorPool $operatorPool = null
    ) {
        $this->operatorPool = $operatorPool ?? new OperatorPool();
        $this->conditionManager = $conditionManager ?? new ConditionManager($this->operatorPool);
    }

    public function addOperator(OperatorType $type, string $operatorCode, OperatorInterface $operator): LogicTreeFacade
    {
        $this->operatorPool->addOperator($type, $operatorCode, $operator);

        return $this;
    }

    public function createDataSource(iterable $data): DataSource
    {
        return new DataSource($data);
    }

    public function executeCombineConditions(NodeInterface $node, DataSource $dataSource): NodeResult
    {
        return $this->conditionManager->execute($node, $dataSource);
    }
}
