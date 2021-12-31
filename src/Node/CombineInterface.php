<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All right reserved.
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
    public function setChildren(array $children): CombineInterface;

    /**
     * Add a logic structure as condition or combination
     *
     * @param NodeInterface $node
     */
    public function addChild(NodeInterface $node): CombineInterface;

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
    public function setIsInvert(bool $isInvert): CombineInterface;
}
