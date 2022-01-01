<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

use function count;

/**
 * The AND:
 * The output is "true" when both inputs are "true.". Otherwise, the output is "false".
 */
final class AndOperator implements OperatorInterface
{
    public const CODE = 'and';

    public function execute(mixed ...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $result && $i < $count; $i++) {
            $result = $result && $expressions[$i];
        }

        return $result;
    }
}
