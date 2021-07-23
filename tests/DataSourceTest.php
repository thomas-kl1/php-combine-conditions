<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Test;

use PHPUnit\Framework\TestCase;
use LogicTree\DataSource;

/**
 * Test the \LogicTree\DataSource object.
 */
class DataSourceTest extends TestCase
{
    /**
     * Test the data
     *
     * @return void
     */
    public function testData(): void
    {
        $dataSource = new DataSource();

        $data = ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'];
        $addData = ['key2' => 'newValue2', 'key4' => 'value4'];
        $mergedData = array_merge($data, $addData);
        $unsetValues = ['key1', 'key4'];
        $finalData = ['key2' => 'newValue2', 'key3' => 'value3'];
        $dataSourceMirror = new DataSource($data);

        // Test getData
        $this->assertIsArray($dataSource->getData());
        $this->assertSame([], $dataSource->getData());

        // Test setData
        $dataSource->setData($data);
        $this->assertSame($data, $dataSource->getData());

        // Test Construct
        $this->assertEquals($dataSourceMirror, $dataSource);
        $this->assertSame($dataSourceMirror->getData(), $dataSource->getData());

        // Test addData
        $dataSource->addData($addData);
        $this->assertSame($mergedData, $dataSource->getData());

        // Test unsetValues
        $dataSource->unsetValues($unsetValues);
        $this->assertSame($finalData, $dataSource->getData());
    }

    /**
     * Test the values
     *
     * @return void
     */
    public function testValue(): void
    {
        $dataSource = new DataSource();

        $key = 'key1';
        $value = 'value1';

        // Test getValue
        $this->assertNull($dataSource->getValue($key));

        // Test setValue
        $dataSource->setValue($key, $value);
        $this->assertSame($value, $dataSource->getValue($key));

        // Test unsetValue
        $dataSource->unsetValue($key);
        $this->assertNull($dataSource->getValue($key));
    }

    /**
     * Test the interoperability between data and values
     *
     * @return void
     */
    public function testDataValue(): void
    {
        $dataSource = new DataSource();

        $data = ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'];
        $addData = ['key2' => 'newValue2', 'key4' => 'value4'];
        $mergedData = array_merge($data, $addData);
        $unsetValues = ['key1', 'key4'];
        $finalData = ['key2' => 'newValue2', 'key3' => 'value3'];
        $key = 'key1';
        $value = 'value1';

        // Test getData
        $this->assertIsArray($dataSource->getData());
        $this->assertSame([], $dataSource->getData());
        $this->assertNull($dataSource->getValue($key));

        // Test setData
        $dataSource->setData($data);
        $this->assertSame($data, $dataSource->getData());
        $this->assertSame($value, $dataSource->getValue($key));

        // Test addData
        $dataSource->addData($addData);
        $this->assertSame($mergedData, $dataSource->getData());
        $this->assertSame($value, $dataSource->getValue($key));

        // Test setValue
        $dataSource->setValue($key, $value);
        $this->assertSame($value, $dataSource->getValue($key));
        $this->assertContains($value, $dataSource->getData());

        // Test unsetValue
        $dataSource->unsetValue($key);
        $this->assertNull($dataSource->getValue($key));
        $this->assertNotContains($value, $dataSource->getData());

        // Test unsetValues
        $dataSource->unsetValues($unsetValues);
        $this->assertSame($finalData, $dataSource->getData());
        $this->assertNull($dataSource->getValue($key));
    }
}
