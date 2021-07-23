<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All right reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator;

/**
 * @api
 */
interface OperatorInterface
{
    /**
     * Execute operator for the expressions
     *
     * @param mixed ...$expressions
     * @return bool
     */
    public function execute(mixed ...$expressions): bool;
}
