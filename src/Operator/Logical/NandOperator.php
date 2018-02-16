<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

/**
 * Class NandOperator
 *
 * The NAND:
 * The output is "false" if both inputs are "true". Otherwise, the output is "true".
 */
final class NandOperator implements OperatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = !($result && $expressions[$i]);
        }

        return $result;
    }
}
