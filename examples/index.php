<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';

use LogicTree\Formatter\ConverterInterface;
use LogicTree\Formatter\NaturalFormatter;
use LogicTree\LogicTreeFacade;
use LogicTree\Node\Combine;
use LogicTree\Node\Condition;
use LogicTree\Operator\OperatorInterface;
use LogicTree\Operator\OperatorType;

/**
 * Class CustomOperator
 */
class CustomOperator implements OperatorInterface
{
    public const CODE = 'custom_op';

    /**
     * {@inheritdoc}
     */
    public function execute(mixed ...$expressions): bool
    {
        return array_sum($expressions) > 5;
    }
}

class CustomOpConverter implements  ConverterInterface
{
    public function convert(mixed ...$expressions): string
    {
        return 'SUM(' . implode(', ', $expressions) . ') > 5';
    }
}

/**
 * USE CASES
 */
$logicTreeFacade = new LogicTreeFacade();

$dataSource = $logicTreeFacade->createDataSource(['value_1' => 'toto', 'value_2' => 5]);

$expr1 = new Condition('value_1', 'eq', 'toto');
$expr2 = new Condition('value_2', 'custom_op', 10);
$exprA = new Condition('value_1', 'regexp', '/^[A-Z]+/');
$exprB = new Condition('value_2', 'custom_op', 10);
$combA = new Combine('xor', true, [$exprA, $exprB]);
$logicTree = new Combine('and', false, [$expr1, $expr2, $combA]);

// Add new operator
$logicTreeFacade->addOperator(OperatorType::Comparator, 'custom_op', new CustomOperator());

// Execute combine conditions
var_dump($logicTreeFacade->executeCombineConditions($logicTree, $dataSource));

$formatter = new NaturalFormatter();
$formatter->register('custom_op', new CustomOpConverter());
echo '<hr>';
echo $formatter->format($logicTree, $dataSource);
