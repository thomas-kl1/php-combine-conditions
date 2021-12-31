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
abstract class AbstractDecorator implements FormatterInterface
{
    public function __construct(private FormatterInterface $formatter) {}

    abstract protected function decorate(string $output): string;

    final public function format(NodeInterface $node, DataSource $dataSource): string
    {
        return $this->decorate($this->formatter->format($node, $dataSource));
    }

    final public function register(string $operator, ConverterInterface $converter): void
    {
        $this->formatter->register($operator, $converter);
    }
}
