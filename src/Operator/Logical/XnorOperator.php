<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

/**
 * Class XnorOperator
 *
 * The XNOR (exclusive-NOR):
 * The output is "true" if the inputs are the same, and "false" if the inputs are different.
 */
final class XnorOperator implements OperatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = !($result xor $expressions[$i]);
        }

        return $result;
    }
}