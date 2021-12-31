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
    /**
     * Retrieve the value key identifier to compare
     */
    public function getValueIdentifier(): string;

    /**
     * Set the value key identifier to compare
     */
    public function setValueIdentifier(string $identifier): ConditionInterface;

    /**
     * Retrieve the value to compare
     */
    public function getValueCompare(): mixed;

    /**
     * Set the value to compare
     */
    public function setValueCompare(mixed $value): ConditionInterface;
}
