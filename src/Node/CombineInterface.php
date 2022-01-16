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
     * @return self
     */
    public function setChildren(array $children): static;

    /**
     * Add a logic structure as condition or combination
     *
     * @param NodeInterface $node
     * @return self
     */
    public function addChild(NodeInterface $node): static;

    /**
     * Retrieve the count of children nodes
     *
     * @return int
     */
    public function getCount(): int;

    /**
     * Check if it has children
     *
     * @return bool
     */
    public function hasChildren(): bool;

    /**
     * Check if the result should be inverted
     *
     * @return bool
     */
    public function isInvert(): bool;

    /**
     * Set is result of combination inverted
     *
     * @param bool $isInvert
     * @return self
     */
    public function setIsInvert(bool $isInvert): static;
}
