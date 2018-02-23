<?php
/**
 * Copyright © 2018 Uniwax, All right reserved.
 */

namespace LogicTree\Model;

/**
 * Interface CombineInterface
 * @api
 */
interface CombineInterface extends NodeInterface
{
    /**
     * Retrieve the conditions as array of conditions or combinations
     *
     * @return \LogicTree\Model\NodeInterface[]
     */
    public function getChildren(): array;

    /**
     * Set the logic structure as conditions or combinations
     *
     * @param \LogicTree\Model\NodeInterface[] $children
     * @return \LogicTree\Model\Combine
     */
    public function setChildren(array $children): CombineInterface;

    /**
     * Add a logic structure as condition or combination
     *
     * @param \LogicTree\Model\NodeInterface $node
     * @return \LogicTree\Model\Combine
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
     * @return \LogicTree\Model\Combine
     */
    public function setIsInvert(bool $isInvert): CombineInterface;
}
