<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Formatter\Natural\Logical;

use LogicTree\Formatter\ConverterInterface;

use function implode;

final class LogicalOperatorConverter implements ConverterInterface
{
    public function __construct(private string $symbol) {}

    public function convert(mixed ...$expressions): string
    {
        return '(' . implode(' ' . $this->symbol . ' ', $expressions) . ')';
    }
}
