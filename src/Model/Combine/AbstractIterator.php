<?php
/**
 * Copyright © Thomas Klein. All rights reserved.
 * See LICENCE in the root dir for license details.
 */
declare(strict_types=1);

namespace LogicTree\Model\Combine;

use LogicTree\Model\ConditionInterface;

/**
 * Class AbstractIterator
 */
abstract class AbstractIterator implements \Iterator
{
    /**
     * @var int
     */
    private $key;

    /**
     * @var array
     */
    protected $items;

    /**
     * @param array $items [optional]
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
}
