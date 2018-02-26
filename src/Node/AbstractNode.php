<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Node;

/**
 * Class AbstractCondition
 */
abstract class AbstractNode implements NodeInterface
{
    /**
     * @var \LogicTree\Node\CombineInterface
     */
    private $parent;

    /**
     * {@inheritdoc}
     */
    public function getParent(): CombineInterface
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function setParent(CombineInterface $combine): NodeInterface
    {
        $this->parent = $combine;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasParent(): bool
    {
        return ($this->parent !== null);
    }
}
