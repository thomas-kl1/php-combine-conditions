<?php declare(strict_types=1);
/**
 * Copyright © OpenGento, All rights reserved.
 */

namespace LogicTree\Operator;

enum OperatorType: string
{
    case Comparator = 'comparator';

    case Logical = 'logical';
}
