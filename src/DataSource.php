<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree;

/**
 * Class DataSource
 * @api
 */
class DataSource
{
    /**
     * Associative data array by key pair value
     *
     * @var array
     */
    private $data;

    /**
     * DataSource constructor
     *
     * @param iterable $data [optional]
     */
    public function __construct(iterable $data = [])
    {
        $this->setData($data);
    }

    /**
     * Retrieve the data
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Set the new data
     *
     * @param iterable $data
     * @return \LogicTree\DataSource
     */
    public function setData(iterable $data): DataSource
    {
        $this->data = [];
        foreach ($data as $key => $value) {
            $this->setValue($key, $value);
        }
        return $this;
    }

    /**
     * Add and replace data on duplicate
     *
     * @param iterable $data
     * @return \LogicTree\DataSource
     */
    public function addData(iterable $data): DataSource
    {
        foreach ($data as $key => $value) {
            $this->setValue($key, $value);
        }
        return $this;
    }

    /**
     * Remove the data by keys
     *
     * @param array $keys
     * @return \LogicTree\DataSource
     */
    public function unsetData(array $keys): DataSource
    {
        foreach ($keys as $key) {
            $this->unsetValue($key);
        }
        return $this;
    }

    /**
     * Retrieve the data value
     *
     * @param string $key
     * @return mixed|null
     */
    public function getValue(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * Set the data value
     *
     * @param string $key
     * @param mixed $value
     * @return \LogicTree\DataSource
     */
    public function setValue(string $key, $value): DataSource
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * Remove the data value
     *
     * @param string $key
     * @return \LogicTree\DataSource
     */
    public function unsetValue(string $key): DataSource
    {
        unset($this->data[$key]);
        return $this;
    }
}
