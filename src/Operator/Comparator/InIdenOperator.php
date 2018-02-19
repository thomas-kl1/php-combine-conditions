<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Operator\Comparator;

use LogicTree\Operator\OperatorInterface;

/**
 * Class InIdenOperator
 *
 * The IN IDENTICAL:
 * The output is "true" if $expr1 is in list $expr2, and they are of the same type.
 */
final class InIdenOperator extends AbstractCompareTwo implements OperatorInterface
{
    const CODE = 'iniden';

    /**
     * {@inheritdoc}
     */
    public function executeComparison(mixed $expr1, mixed $expr2): bool
    {
        return in_array($expr1, $expr2, true);
    }
}
