<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
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
    public function testData()
    {
        $dataSource = new DataSource();

        $data = ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'];
        $addData = ['key2' => 'newValue2', 'key4' => 'value4'];
        $mergedData = array_merge($data, $addData);
        $unsetData = ['key1', 'key4'];
        $finalData = ['key2' => 'newValue2', 'key3' => 'value3'];
        $dataSourceMirror = new DataSource($data);

        // Test getData
        $this->assertInternalType('array', $dataSource->getData());
        $this->assertSame([], $dataSource->getData());

        // Test setData
        $this->assertInstanceOf(DataSource::class, $dataSource->setData($data));
        $this->assertSame($data, $dataSource->getData());

        // Test Construct
        $this->assertEquals($dataSourceMirror, $dataSource);
        $this->assertSame($dataSourceMirror->getData(), $dataSource->getData());

        // Test addData
        $this->assertInstanceOf(DataSource::class, $dataSource->addData($addData));
        $this->assertSame($mergedData, $dataSource->getData());

        // Test unsetValues
        $this->assertInstanceOf(DataSource::class, $dataSource->unsetValues($unsetData));
        $this->assertSame($finalData, $dataSource->getData());
    }

    /**
     * Test the values
     *
     * @return void
     */
    public function testValue()
    {
        $dataSource = new DataSource();

        $key = 'key1';
        $value = 'value1';

        // Test getValue
        $this->assertNull($dataSource->getValue($key));

        // Test setValue
        $this->assertInstanceOf(DataSource::class, $dataSource->setValue($key, $value));
        $this->assertSame($value, $dataSource->getValue($key));

        // Test unsetValue
        $this->assertInstanceOf(DataSource::class, $dataSource->unsetValue($key));
        $this->assertNull($dataSource->getValue($key));
    }

    /**
     * Test the interoperability between data and values
     *
     * @return void
     */
    public function testDataValue()
    {
        $dataSource = new DataSource();

        $data = ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'];
        $addData = ['key2' => 'newValue2', 'key4' => 'value4'];
        $mergedData = array_merge($data, $addData);
        $unsetData = ['key1', 'key4'];
        $finalData = ['key2' => 'newValue2', 'key3' => 'value3'];
        $key = 'key1';
        $value = 'value1';

        // Test getData
        $this->assertInternalType('array', $dataSource->getData());
        $this->assertSame([], $dataSource->getData());
        $this->assertNull($dataSource->getValue($key));

        // Test setData
        $this->assertInstanceOf(DataSource::class, $dataSource->setData($data));
        $this->assertSame($data, $dataSource->getData());
        $this->assertSame($value, $dataSource->getValue($key));

        // Test addData
        $this->assertInstanceOf(DataSource::class, $dataSource->addData($addData));
        $this->assertSame($mergedData, $dataSource->getData());
        $this->assertSame($value, $dataSource->getValue($key));

        // Test unsetData
        $this->assertInstanceOf(DataSource::class, $dataSource->unsetData($unsetData));
        $this->assertSame($finalData, $dataSource->getData());
        $this->assertNull($dataSource->getValue($key));

        // Test setValue
        $this->assertInstanceOf(DataSource::class, $dataSource->setValue($key, $value));
        $this->assertSame($value, $dataSource->getValue($key));
        $this->assertTrue(in_array($value, $dataSource->getData()));

        // Test unsetValue
        $this->assertInstanceOf(DataSource::class, $dataSource->unsetValue($key));
        $this->assertNull($dataSource->getValue($key));
        $this->assertFalse(in_array($value, $dataSource->getData()));
    }
}
