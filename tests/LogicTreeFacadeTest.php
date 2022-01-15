<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Test;

use LogicTree\LogicTreeFacade;
use LogicTree\Node\Combine;
use LogicTree\Node\Condition;
use PHPUnit\Framework\TestCase;

/**
 * Test the \LogicTree\DataSource object.
 */
class LogicTreeFacadeTest extends TestCase
{
    public function testSimpleCase(): void {
        $logicTreeFacade = new LogicTreeFacade();

        $dataSource = $logicTreeFacade->createDataSource(['value_1' => 'toto', 'value_2' => 10]);

        $expr1 = new Condition('value_1', 'eq', 'toto'); // true
        $expr2 = new Condition('value_2', 'gt', 5); // true
        $exprA = new Condition('value_1', 'regexp', '/^[A-Z]+/'); // true
        $exprB = new Condition('value_2', 'lt', 1); // false
        $combA = new Combine('or', true, [$exprA, $exprB]); // true OR false
        $logicTree = new Combine('and', false, [$expr1, $expr2, $combA]); // true AND true AND true

        $this->assertTrue($logicTreeFacade->executeCombineConditions($logicTree, $dataSource));
    }
}