<?php
/**
 * Copyright © Thomas Klein. All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Model\AbstractModel;

use LogicTree\Model\ConditionInterface;

/**
 * Class AbstractIterator
 */
abstract class AbstractCombine extends AbstractCondition implements \Iterator, \Countable
{
    /**
     * @var int
     */
    private $key;

    /**
     * @var \LogicTree\Model\ConditionInterface[]
     */
    protected $items;

    /**
     * @param \LogicTree\Model\ConditionInterface[] $items [optional]
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
        $this->rewind();
    }

    /**
     * {@inheritdoc}
     */
    public function current(): ConditionInterface
    {
        return $this->items[$this->key()];
    }

    /**
     * {@inheritdoc}
     */
    public function next(): void
    {
        $this->key++;
    }

    /**
     * {@inheritdoc}
     */
    public function key(): int
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function valid(): bool
    {
        return isset($this->items[$this->key()]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind(): void
    {
        $this->key = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->items);
    }
}
