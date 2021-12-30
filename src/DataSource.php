<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree;

use ArrayAccess;
use InvalidArgumentException;
use function is_array;

/**
 * @api
 */
class DataSource
{
    public function __construct(private iterable $data = [])
    {
        $this->setData($data);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(iterable $data): DataSource
    {
        if (!is_array($data) && !($data instanceof ArrayAccess)) {
            throw new InvalidArgumentException('Data must be an array or implements ArrayAccess.');
        }

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
