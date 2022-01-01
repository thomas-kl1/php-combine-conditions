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

    public function setData(iterable $data): void
    {
        if (!is_array($data) && !($data instanceof ArrayAccess)) {
            throw new InvalidArgumentException('Data must be an array or implements ArrayAccess.');
        }

        $this->data = [];

        foreach ($data as $key => $value) {
            $this->setValue($key, $value);
        }
    }

    public function addData(iterable $data): void
    {
        foreach ($data as $key => $value) {
            $this->setValue($key, $value);
        }
    }

    public function getValue(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function setValue(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    public function unsetValue(string $key): void
    {
        unset($this->data[$key]);
    }

    public function unsetValues(array $keys): void
    {
        foreach ($keys as $key) {
            $this->unsetValue($key);
        }
    }
}
