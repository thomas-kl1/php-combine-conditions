<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

use function count;

/**
 * The XOR (exclusive-OR):
 * The output is "false" if both inputs are "false" or if both inputs are "true".
 */
final class XorOperator implements OperatorInterface
{
    public const CODE = 'xor';

    public function execute(mixed ...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = ($result xor $expressions[$i]);
        }

        return $result;
    }
}
