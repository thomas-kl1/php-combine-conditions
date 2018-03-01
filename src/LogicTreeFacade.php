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

/**
 * Class LogicTreeFacade
 */
class LogicTreeFacade
{
    /**
     * @var \LogicTree\Service\ConditionManager
     */
    private $conditionManager;

    /**
     * @var \LogicTree\Operator\OperatorPool
     */
    private $operatorPool;

    /**
     * @param \LogicTree\Service\ConditionManager|null $conditionManager
     */
    public function __construct(?ConditionManager $conditionManager = null)
    {
        $this->conditionManager = $conditionManager;
        $this->operatorPool = new OperatorPool();

        if ($conditionManager === null) {
            $this->instantiateConditionManager();
        }
    }

    /**
     * Add a new Operator to the interpreter
     *
     * @param string $type
     * @param string $operatorCode
     * @param \LogicTree\Operator\OperatorInterface $operator
     * @return \LogicTree\LogicTreeFacade
     */
    public function addOperator(string $type, string $operatorCode, OperatorInterface $operator): LogicTreeFacade
    {
        $this->operatorPool->addOperator($type, $operatorCode, $operator);
        $this->instantiateConditionManager();
        return $this;
    }

    /**
     * Create a new data source
     *
     * @param iterable $data
     * @return \LogicTree\DataSource
     */
    public function createDataSource(iterable $data): DataSource
    {
        return new DataSource($data);
    }

    /**
     * Execute the logic tree structure conditions
     *
     * @param \LogicTree\Node\NodeInterface $node
     * @param \LogicTree\DataSource $dataSource
     * @return bool
     */
    public function executeCombineConditions(NodeInterface $node, DataSource $dataSource): bool
    {
        return $this->conditionManager->execute($node, $dataSource);
    }

    /**
     * Execute the logic tree structure conditions
     *
     * @param string $format
     * @param mixed $node
     * @param iterable $dataSource
     * @return bool
     */
    public function executeCombineConditionsFormat(string $format, mixed $node, iterable $dataSource): bool
    {
        return $this->conditionManager->execute(
            $this->convertFormat($format, $node),
            $this->createDataSource($dataSource)
        );
    }

    /**
     * Transform an array conditions to a combine conditions object
     *
     * @param string $format
     * @param mixed $node
     * @return \LogicTree\Node\NodeInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function convertFormat(string $format, mixed $node): NodeInterface
    {
        //todo implement method.
        throw new \LogicException('Not implemented yet!');
    }

    /**
     * Create a new instance of condition manager
     *
     * @return void
     */
    private function instantiateConditionManager(): void
    {
        $this->conditionManager = new ConditionManager($this->operatorPool);
    }
}
