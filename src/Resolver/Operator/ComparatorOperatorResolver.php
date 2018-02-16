<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Resolver\Operator;

use LogicTree\Resolver\OperatorResolverInterface;

/**
 * Class ComparatorOperatorResolver
 */
final class ComparatorOperatorResolver extends AbstractOperatorResolver implements OperatorResolverInterface
{
    /**
     * @var \LogicTree\Resolver\Operator\ComparatorOperatorResolver|null
     */
    private static $instance = null;

    /**
     * LogicalOperatorResolver Construct
     */
    private function __construct() {}

    /**
     * Retrieve the singleton instance of Operator Resolver
     *
     * @return \LogicTree\Resolver\Operator\ComparatorOperatorResolver
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new ComparatorOperatorResolver();
        }

        return self::$instance;
    }

    /**
     * {@inheritdoc}
     */
    protected function retrieveFullClassName(string $operator): string
    {
        return '\\LogicTree\\Operator\\Comparator\\' . ucfirst($operator) . 'Operator';
    }
}
