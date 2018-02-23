<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
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
    const CODE = 'nor';

    /**
     * {@inheritdoc}
     */
    public function execute(...$expressions): bool
    {
        $result = false;

        if (!$expressions[0]) {
            $count = count($expressions);
            $result = $expressions[0];

            for ($i = 1; !$expressions[$i] && $i < $count; $i++) {
                $result = !($result || $expressions[$i]);
            }
        }

        return $result;
    }
}
