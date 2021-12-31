<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Formatter;

use LogicTree\DataSource;
use LogicTree\Node\NodeInterface;

/**
 * @api
 */
interface FormatterInterface
{
    public function format(NodeInterface $node, DataSource $dataSource): string;

    public function register(string $operator, ConverterInterface $converter): void;
}
