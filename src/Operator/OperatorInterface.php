<?php
/**
 * Copyright © Thomas Klein, All right reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator;

/**
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
