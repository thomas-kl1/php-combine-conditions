<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

/**
 * Class XorOperator
 *
 * The XOR (exclusive-OR):
 * The output is "false" if both inputs are "false" or if both inputs are "true".
 */
final class XorOperator implements OperatorInterface
{
    const CODE = 'xor';

    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = ($result xor $expressions[$i]);
        }

        return $result;
    }
}
