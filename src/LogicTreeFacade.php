<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree;

use LogicTree\Node\NodeInterface;
use LogicTree\Operator\OperatorInterface;
use LogicTree\Operator\OperatorPool;
use LogicTree\Service\ConditionManager;

class LogicTreeFacade
{
    /**
     * @var ConditionManager
     */
    private $conditionManager;

    /**
     * @var OperatorPool
     */
    private $operatorPool;

    public function __construct(?ConditionManager $conditionManager = null)
    {
        $this->operatorPool = new OperatorPool();
        $this->conditionManager = $conditionManager ?? new ConditionManager($this->operatorPool);
    }

    public function addOperator(string $type, string $operatorCode, OperatorInterface $operator): LogicTreeFacade
    {
        $this->operatorPool->addOperator($type, $operatorCode, $operator);
        return $this;
    }

    public function createDataSource(iterable $data): DataSource
    {
        return new DataSource($data);
    }

    public function executeCombineConditions(NodeInterface $node, DataSource $dataSource): bool
    {
        return $this->conditionManager->execute($node, $dataSource);
    }

    public function executeCombineConditionsFormat(string $format, $node, iterable $dataSource): bool
    {
        return $this->conditionManager->execute(
            $this->convertFormat($format, $node),
            $this->createDataSource($dataSource)
        );
    }

    public function convertFormat(
        /** @scrutinizer ignore-unused */ 
        string $format,
        /** @scrutinizer ignore-unused */ 
        $node
    ): NodeInterface {
        //todo implement method.
        throw new \LogicException('Not implemented yet!');
    }
}
