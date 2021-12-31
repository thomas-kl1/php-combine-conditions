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
    public function execute(mixed ...$expressions): bool;
}
