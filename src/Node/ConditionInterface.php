<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All right reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

/**
 * @api
 */
interface ConditionInterface extends NodeInterface
{
    public function getValueIdentifier(): string;

    public function setValueIdentifier(string $identifier): void;

    public function getValueCompare(): mixed;

    public function setValueCompare(mixed $value): void;
}
