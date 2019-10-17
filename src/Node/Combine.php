<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Node;

use LogicException;
use function count;

final class Combine extends AbstractNode implements CombineInterface
{
    /**
     * @var string
     */
    private $operator;

    /**
     * @var bool
     */
    private $isInvert;

    /**
     * @var NodeInterface[]
     */
    private $nodes;

    /**
     * @param string $operator
     * @param bool $isInvert [optional] Is false by default.
     * @param NodeInterface[] $children [optional] Is empty by default.
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

    public function getChildren(): array
    {
        return $this->nodes;
    }

    public function setChildren(array $children): CombineInterface
    {
        $this->nodes = [];

        foreach ($children as $child) {
            $this->addChild($child);
        }

        return $this;
    }

    public function addChild(NodeInterface $condition): CombineInterface
    {
        if ($condition === $this) {
            throw new LogicException('Child node cannot be the current instance of itself.');
        }

        $condition->setParent($this);
        $this->nodes[] = $condition;

        return $this;
    }

    public function getCount(): int
    {
        return count($this->getChildren());
    }

    public function hasChildren(): bool
    {
        return $this->getCount() > 0;
    }

    public function isInvert(): bool
    {
        return $this->isInvert;
    }

    public function setIsInvert(bool $isInvert): CombineInterface
    {
        $this->isInvert = $isInvert;

        return $this;
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): CombineInterface
    {
        $this->operator = $operator;

        return $this;
    }
}
