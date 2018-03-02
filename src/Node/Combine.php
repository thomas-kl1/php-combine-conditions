<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Node;

/**
 * Class Combine
 */
final class Combine extends AbstractNode implements CombineInterface
{
    /**
     * Operator code
     *
     * @var string
     */
    private $operator;

    /**
     * Invert final result flag
     *
     * @var bool
     */
    private $isInvert;

    /**
     * Nodes elements array
     *
     * @var \LogicTree\Node\NodeInterface[]
     */
    private $nodes;

    /**
     * Combine constructor
     *
     * @param string $operator
     * @param bool $isInvert [optional] Is false by default.
     * @param \LogicTree\Node\NodeInterface[] $children [optional] Is empty by default.
     */
    public function __construct(
        string $operator,
        bool $isInvert = null,
        array $children = []
    ) {
        $this->setOperator($operator);
        $this->setIsInvert($isInvert ?? false);
        $this->setChildren($children);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren(): array
    {
        return $this->nodes;
    }

    /**
     * {@inheritdoc}
     */
    public function setChildren(array $children): CombineInterface
    {
        $this->nodes = [];
        foreach ($children as $child) {
            $this->addChild($child);
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addChild(NodeInterface $condition): CombineInterface
    {
        $condition->setParent($this);
        $this->nodes[] = $condition;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCount(): int
    {
        return count($this->getChildren());
    }

    /**
     * {@inheritdoc}
     */
    public function hasChildren(): bool
    {
        return ($this->getCount() > 0);
    }

    /**
     * {@inheritdoc}
     */
    public function isInvert(): bool
    {
        return $this->isInvert;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsInvert(bool $isInvert): CombineInterface
    {
        $this->isInvert = $isInvert;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * {@inheritdoc}
     */
    public function setOperator(string $operator): CombineInterface
    {
        $this->operator = $operator;
        return $this;
    }
}
