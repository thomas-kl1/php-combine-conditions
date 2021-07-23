<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All right reserved.
 */

namespace LogicTree\Node;

/**
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
     * @return NodeInterface
     */
    public function setOperator(string $operator);//: NodeInterface;

    /**
     * Retrieve the parent combine
     *
     * @return CombineInterface|null
     */
    public function getParent(): ?CombineInterface;

    /**
     * Set the parent combine
     *
     * @param CombineInterface|null $condition
     * @return NodeInterface
     */
    public function setParent(?CombineInterface $condition);//: NodeInterface;

    /**
     * Check if it has an existing parent
     *
     * @return bool
     */
    public function hasParent(): bool;
}
