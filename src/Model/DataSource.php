<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Model;

/**
 * Class DataSource
 * @api
 */
class DataSource
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data [optional]
     */
    public function __construct(array $data = [])
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
     * @param array $data
     * @return \LogicTree\Model\DataSource
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Add and replace data on duplicate
     *
     * @param array $data
     * @return \LogicTree\Model\DataSource
     */
    public function addData(array $data): self
    {
        $this->data = array_merge($this->getData(), $data);
        return $this;
    }

    /**
     * Retrieve the data value
     *
     * @param string $key
     * @return mixed|null
     */
    public function getValue(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    /**
     * Set the data value
     *
     * @param string $key
     * @param mixed $value
     * @return \LogicTree\Model\DataSource
     */
    public function setValue(string $key, mixed $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }
}
