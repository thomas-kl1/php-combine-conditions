<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
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
     * @return self
     */
    public function setOperator(string $operator): static;

    /**
     * Retrieve the parent combine
     *
     * @return CombineInterface|null
     */
    public function getParent(): ?CombineInterface;

    /**
     * Set the parent combine
     *
     * @param CombineInterface|null $combine
     * @return self
     */
    public function setParent(?CombineInterface $combine): static;

    /**
     * Check if it has an existing parent
     *
     * @return bool
     */
    public function hasParent(): bool;
}
