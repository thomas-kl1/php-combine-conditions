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
     * @return \LogicTree\Node\ConditionInterface
     */
    public function setOperator(string $operator);

    /**
     * Retrieve the parent combine
     *
     * @return \LogicTree\Node\CombineInterface
     */
    public function getParent(): CombineInterface;

    /**
     * Set the parent combine
     *
     * @param \LogicTree\Node\CombineInterface $condition
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
