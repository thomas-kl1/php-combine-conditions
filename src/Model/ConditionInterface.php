<?php
/**
 * Copyright © 2018 Thomas Klein, All right reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Model;

/**
 * Interface ConditionInterface
 * @api
 */
interface ConditionInterface extends NodeInterface
{
    /**
     * Retrieve the value key identifier to compare
     *
     * @return string
     */
    public function getValueIdentifier(): string;

    /**
     * Set the value key identifier to compare
     *
     * @param string $identifier
     * @return \LogicTree\Model\ConditionInterface
     */
    public function setValueIdentifier(string $identifier): ConditionInterface;

    /**
     * Retrieve the value to compare
     *
     * @return mixed
     */
    public function getValueCompare(): mixed;

    /**
     * Set the value to compare
     *
     * @param mixed $value
     * @return \LogicTree\Model\ConditionInterface
     */
    public function setValueCompare(mixed $value): ConditionInterface;
}
