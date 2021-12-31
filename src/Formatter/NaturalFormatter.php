<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Formatter;

use LogicTree\DataSource;
use LogicTree\Formatter\Natural\Comparator\CompareListConverter;
use LogicTree\Formatter\Natural\Comparator\CompareOneConverter;
use LogicTree\Formatter\Natural\Comparator\CompareTwoConverter;
use LogicTree\Formatter\Natural\Logical\LogicalOperatorConverter;
use LogicTree\Node\CombineInterface;
use LogicTree\Node\ConditionInterface;
use LogicTree\Node\NodeInterface;

use function array_map;

final class NaturalFormatter implements FormatterInterface
{
    /**
     * @var ConverterInterface[]
     */
    private array $converters = [];

    public function __construct()
    {
        $this->register('empty', new CompareOneConverter('IS EMPTY'));
        $this->register('eq', new CompareTwoConverter('=='));
        $this->register('gteq', new CompareTwoConverter('>='));
        $this->register('gt', new CompareTwoConverter('>'));
        $this->register('iden', new CompareTwoConverter('==='));
        $this->register('iniden', new CompareTwoConverter('IN STRICT'));
        $this->register('in', new CompareTwoConverter('IN'));
        $this->register('lteq', new CompareTwoConverter('<='));
        $this->register('lt', new CompareTwoConverter('<'));
        $this->register('neq', new CompareTwoConverter('!='));
        $this->register('niden', new CompareTwoConverter('!=='));
        $this->register('niniden', new CompareTwoConverter('NOT IN STRICT'));
        $this->register('nin', new CompareListConverter('NOT IN'));
        $this->register('notnull', new CompareOneConverter('IS NOT NULL'));
        $this->register('null', new CompareOneConverter('IS NULL'));
        $this->register('regexp', new CompareTwoConverter('MATCH REGEX'));
        $this->register('and', new LogicalOperatorConverter('AND'));
        $this->register('nand', new LogicalOperatorConverter('NAND'));
        $this->register('nor', new LogicalOperatorConverter('NOR'));
        $this->register('or', new LogicalOperatorConverter('OR'));
        $this->register('xnor', new LogicalOperatorConverter('XNOR'));
        $this->register('xor', new LogicalOperatorConverter('XOR'));
    }

    public function register(string $operator, ConverterInterface $converter): void
    {
        $this->converters[$operator] = $converter;
    }

    public function format(NodeInterface $node, DataSource $dataSource): string
    {
        return match (true) {
            $node instanceof CombineInterface => $this->formatCombine($node, $dataSource),
            $node instanceof ConditionInterface => $this->formatCondition($node, $dataSource),
            default => throw new \Exception()//ToDo
        };
    }

    private function formatCombine(CombineInterface $combine, DataSource $dataSource): string
    {
        return ($combine->isInvert() ? 'NOT ' : '') . $this->converters[$combine->getOperator()]->convert(
            ...array_map(fn (NodeInterface $node) => $this->format($node, $dataSource), $combine->getChildren())
        );
    }

    private function formatCondition(ConditionInterface $condition, DataSource $dataSource): string
    {//ToDo exception if not exists
        return $this->converters[$condition->getOperator()]->convert(
            $dataSource->getValue($condition->getValueIdentifier()),
            $condition->getValueCompare()
        );
    }
}
