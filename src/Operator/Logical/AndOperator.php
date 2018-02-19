<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

/**
 * Class AndOperator
 *
 * The AND:
 * The output is "true" when both inputs are "true.". Otherwise, the output is "false".
 */
final class AndOperator implements OperatorInterface
{
    const CODE = 'and';

    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $result && $i < $count; $i++) {
            $result = ($result && $expressions[$i]);
        }

        return $result;
    }
}
