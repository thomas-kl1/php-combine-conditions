<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All right reserved.
 */

namespace LogicTree\Node;

/**
 * @api
 * Todo: This interface only provide common base to combine and condition.
 *       We should use union type in signature instead.
 */
interface NodeInterface
{
    public function getOperator(): string;

    public function setOperator(string $operator): NodeInterface;

    public function getParent(): ?CombineInterface;

    public function setParent(?CombineInterface $condition): NodeInterface;

    public function hasParent(): bool;
}
