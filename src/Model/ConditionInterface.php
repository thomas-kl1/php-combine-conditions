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
interface ConditionInterface
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
     * @return \LogicTree\Model\ConditionInterface
     */
    public function setOperator(string $operator);
}
