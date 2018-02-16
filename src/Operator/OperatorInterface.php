<?php
/**
 * Copyright © 2018 Thomas Klein, All right reserved.
 */

namespace LogicTree\Operator;

/**
 * Interface OperatorInterface
 * @api
 */
interface OperatorInterface
{
    /**
     * Execute operator for the expressions
     *
     * @param array ...$expressions
     * @return bool
     */
    public function execute(...$expressions): bool;
}
