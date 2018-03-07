<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

require_once __DIR__.'/../autoloader.php';

/**
 * Class CustomOperator
 */
class CustomOperator implements \LogicTree\Operator\OperatorInterface
{
    public const CODE = 'custom_op';

    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        return array_sum($expressions) > 5;
    }
}

//$operatorPool = new \LogicTree\Operator\OperatorPool();
//$operatorPool->addOperator(\LogicTree\Operator\OperatorPool::TYPE_COMPARATOR, 'custom_operator', new CustomOperator());

//$conditionManager = new \LogicTree\Service\ConditionManager($operatorPool);
//$logicTreeFacade = new \LogicTree\LogicTreeFacade($conditionManager);

/**
 * USE CASES
 */
$logicTreeFacade = new \LogicTree\LogicTreeFacade();

$dataSource = $logicTreeFacade->createDataSource(['value_1' => 'toto', 'value_2' => 5]);

$expr1 = new \LogicTree\Node\Condition('value_1', 'eq', 'toto');
$expr2 = new \LogicTree\Node\Condition('value_2', 'custom_op', 10);
$logicTree = new \LogicTree\Node\Combine('and', false, [$expr1, $expr2]);

// Add new operator
$logicTreeFacade->addOperator(\LogicTree\Operator\OperatorPool::TYPE_COMPARATOR, 'custom_op', new CustomOperator());

// Execute combine conditions
var_dump($logicTreeFacade->executeCombineConditions($logicTree, $dataSource));
