<?php
/**
 * Copyright © 2018 Uniwax, All right reserved.
 */

namespace LogicTree\Node;

/**
 * Interface NodeInterface
 * @api
 */
interface NodeInterface
{
    /**
     * Retrieve the operator
     *
     * @return string
     */
    public function getOperator(): string;

    /**
     * Set the operator
     *
     * @param string $operator
     * @return \LogicTree\Node\NodeInterface
     */
    public function setOperator(string $operator);//: NodeInterface;

    /**
     * Retrieve the parent combine
     *
     * @return \LogicTree\Node\CombineInterface|null
     */
    public function getParent(): ?CombineInterface;

    /**
     * Set the parent combine
     *
     * @param \LogicTree\Node\CombineInterface|null $condition
     * @return \LogicTree\Node\NodeInterface
     */
    public function setParent(?CombineInterface $condition);//: NodeInterface;

    /**
     * Check if it has an existing parent
     *
     * @return bool
     */
    public function hasParent(): bool;
}
