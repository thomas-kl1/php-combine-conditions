<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree;

/**
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

    public function __construct(iterable $data = [])
    {
        $this->setData($data);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(iterable $data): DataSource
    {
        $this->data = [];

        foreach ($data as $key => $value) {
            $this->setValue($key, $value);
        }

        return $this;
    }

    public function addData(iterable $data): DataSource
    {
        foreach ($data as $key => $value) {
            $this->setValue($key, $value);
        }

        return $this;
    }

    public function getValue(string $key)
    {
        return $this->data[$key] ?? null;
    }

    public function setValue(string $key, $value): DataSource
    {
        $this->data[$key] = $value;

        return $this;
    }

    public function unsetValue(string $key): DataSource
    {
        unset($this->data[$key]);

        return $this;
    }

    public function unsetValues(array $keys): DataSource
    {
        foreach ($keys as $key) {
            $this->unsetValue($key);
        }

        return $this;
    }
}
