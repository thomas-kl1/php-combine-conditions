<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

/**
 * @api
 */
interface CombineInterface extends NodeInterface
{
    /**
     * Retrieve the conditions as array of conditions or combinations
     *
     * @return NodeInterface[]
     */
    public function getChildren(): array;

    /**
     * Set the logic structure as conditions or combinations
     *
     * @param NodeInterface[] $children
     */
    public function setChildren(array $children): void;

    /**
     * Add a logic structure as condition or combination
     */
    public function addChild(CombineInterface|ConditionInterface $node): void;

    /**
     * Retrieve the count of children nodes
     */
    public function getCount(): int;

    public function hasChildren(): bool;

    /**
     * Check if the result should be inverted
     */
    public function isInvert(): bool;

    /**
     * Set is result of combination inverted
     */
    public function setIsInvert(bool $isInvert): void;
}
