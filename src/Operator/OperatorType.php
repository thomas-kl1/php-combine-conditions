<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator;

enum OperatorType: string
{
    case Comparator = 'comparator';

    case Logical = 'logical';
}
