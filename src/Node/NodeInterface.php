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
    public function getOperator(): string;

    public function setOperator(string $operator): void;

    public function getParent(): ?CombineInterface;

    public function setParent(?CombineInterface $condition): void;

    public function hasParent(): bool;
}
