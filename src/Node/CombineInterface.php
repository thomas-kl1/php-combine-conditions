<?php
/**
 * Copyright © 2018 Thomas Klein, All right reserved.
 */
declare(strict_types=1);

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
     * @return Combine
     */
    public function setChildren(array $children): CombineInterface;

    /**
     * Add a logic structure as condition or combination
     *
     * @param NodeInterface $node
     * @return Combine
     */
    public function addChild(NodeInterface $node): CombineInterface;

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
     * @return Combine
     */
    public function setIsInvert(bool $isInvert): CombineInterface;
}
