<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

use LogicException;

use function count;

final class Combine extends AbstractNode implements CombineInterface
{
    /**
     * @var NodeInterface[]
     */
    private array $nodes = [];

    public function __construct(
        private string $operator,
        private bool $isInvert = false,
        array $children = []
    ) {
        $this->setOperator($operator);
        $this->setIsInvert($isInvert);
        $this->setChildren($children);
    }

    public function getChildren(): array
    {
        return $this->nodes;
    }

    public function setChildren(array $children): void
    {
        $this->nodes = [];

        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    public function addChild(CombineInterface|ConditionInterface $condition): void
    {
        if ($condition === $this) {
            throw new LogicException('Child node cannot be the current instance of itself.');
        }

        $condition->setParent($this);
        $this->nodes[] = $condition;
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

    public function setIsInvert(bool $isInvert): void
    {
        $this->isInvert = $isInvert;
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }
}
