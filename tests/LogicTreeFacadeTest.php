<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Test;

use LogicTree\Node\Combine;
use LogicTree\Node\Condition;
use PHPUnit\Framework\TestCase;
use LogicTree\DataSource;
use LogicTree\LogicTreeFacade;

/**
 * Test the \LogicTree\LogicTreeFacade object.
 */
class LogicTreeFacadeTest extends TestCase
{
    /**
     * Test the adding operator method
     *
     * @return void
     */
    public function testAddOperator()
    {
        //  ToDo: implement test case scenario.
    }

    /**
     * Test the creation of data source
     *
     * @return void
     */
    public function testCreateDataSource()
    {
        $data = ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'];
        $dataSource = new DataSource($data);
        $logicTreeFacade = new LogicTreeFacade();

        $this->assertEquals($dataSource, $logicTreeFacade->createDataSource($data));
    }

    /**
     * Test the execution of combined conditions
     *
     * @return void
     */
    public function testExecuteCombineConditions()
    {
        $logicTreeFacade = new LogicTreeFacade();
        $data = ['key1' => 'value', 'key2' => 20];
        $dataSource = new DataSource($data);
        $cond1 = new Condition('key1', 'eq', 'value');
        $cond2 = new Condition('key2', 'gteq', 10);
        $combine1 = new Combine('and', false, [$cond1, $cond2]);
        $combine2 = new Combine('and', true, [$cond1, $cond2]);

        $this->assertTrue($logicTreeFacade->executeCombineConditions($combine1, $dataSource));
        $this->assertFalse($logicTreeFacade->executeCombineConditions($combine2, $dataSource));
    }

    /**
     * Test the execution of formated combined conditions
     *
     * @return void
     */
    public function testExecuteCombineConditionsFormat()
    {
        //  ToDo: implement test case scenario.
    }

    /**
     * Test the format converter
     *
     * @return void
     */
    public function testConvertFormat()
    {
        //  ToDo: implement test case scenario.
    }
}
