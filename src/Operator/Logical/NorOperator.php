<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Logical;

use LogicTree\Operator\OperatorInterface;

/**
 * Class NorOperator
 *
 * The NOR:
 * The output is "true" if both inputs are "false". Otherwise, the output is "false".
 */
final class NorOperator implements OperatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        if (!$result) {
            for ($i = 1; !$expressions[$i] && $i < $count; $i++) {
                $result = !($result || $expressions[$i]);
            }
        } else {
            $result = false;
        }

        return $result;
    }
}
