<?php
/**
 * Copyright © 2018 Uniwax, All right reserved.
 */

namespace LogicTree\Model;

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
     * @return \LogicTree\Model\ConditionInterface
     */
    public function setOperator(string $operator);

    /**
     * Retrieve the parent combine
     *
     * @return \LogicTree\Model\CombineInterface
     */
    public function getParent(): CombineInterface;

    /**
     * Set the parent combine
     *
     * @param \LogicTree\Model\CombineInterface $condition
     * @return mixed
     */
    public function setParent(CombineInterface $condition);

    /**
     * Check if it has an existing parent
     *
     * @return bool
     */
    public function hasParent(): bool;
}
