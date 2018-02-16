<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

/**
 * Class OrOperator
 *
 * The OR:
 * The output is "true" if either or both of the inputs are "true".
 * If both inputs are "false," then the output is "false".
 */
final class OrOperator implements OperatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = ($result || $expressions[$i]);
        }

        return $result;
    }
}
