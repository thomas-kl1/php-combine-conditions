<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

/**
 * Class InIdenOperator
 *
 * The IN IDENTICAL:
 * The output is "true" if $expr1 is in list $expr2, and they are of the same type.
 */
final class InIdenOperator extends AbstractCompareTwo
{
    public const CODE = 'iniden';

    /**
     * {@inheritdoc}
     */
    public function executeComparison($expr1, $expr2): bool
    {
        return \in_array($expr1, $expr2, true);
    }
}
