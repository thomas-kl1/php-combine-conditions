<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

use function count;

/**
 * The OR:
 * The output is "true" if either or both of the inputs are "true".
 * If both inputs are "false," then the output is "false".
 */
final class OrOperator implements OperatorInterface
{
    public const CODE = 'or';

    public function execute(mixed ...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = $result || $expressions[$i];
        }

        return $result;
    }
}
