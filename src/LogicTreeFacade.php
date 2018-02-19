<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree;

use LogicTree\Model\ConditionInterface;
use LogicTree\Model\DataSource;
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
    public function __construct(ConditionManager $conditionManager = null)
    {
        $this->operatorPool = new OperatorPool();
        if ($conditionManager === null) {
            $this->instantiateConditionManager();
        } else {
            $this->conditionManager = $conditionManager;
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
    public function addOperator(string $type, string $operatorCode, OperatorInterface $operator): self
    {
        $this->operatorPool->addOperator($type, $operatorCode, $operator);
        $this->instantiateConditionManager();
        return $this;
    }

    /**
     * Create a new data source
     *
     * @param array $data
     * @return \LogicTree\Model\DataSource
     */
    public function createDataSource(array $data): DataSource
    {
        return new DataSource($data);
    }

    /**
     * Execute the logic tree structure conditions
     *
     * @param \LogicTree\Model\ConditionInterface $condition
     * @param \LogicTree\Model\DataSource $dataSource
     * @return bool
     */
    public function executeCombineConditions(ConditionInterface $condition, DataSource $dataSource): bool
    {
        return $this->conditionManager->execute($condition, $dataSource);
    }

    /**
     * Execute the logic tree structure conditions (array)
     *
     * @param array $condition
     * @param array $dataSource
     * @return bool
     */
    public function executeCombineConditionsArray(array $condition, array $dataSource): bool
    {
        return $this->conditionManager->execute(
            $this->arrayToCondition($condition),
            $this->createDataSource($dataSource)
        );
    }

    /**
     * Transform an array conditions to a combine conditions object
     *
     * @param array $condition
     * @return \LogicTree\Model\ConditionInterface
     */
    private function arrayToCondition(array $condition): ConditionInterface
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
