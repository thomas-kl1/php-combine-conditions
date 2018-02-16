<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Resolver\Operator;

use LogicTree\Resolver\OperatorResolverInterface;

/**
 * Class OperatorResolver
 */
final class LogicalOperatorResolver extends AbstractOperatorResolver implements OperatorResolverInterface
{
    /**
     * @var \LogicTree\Resolver\Operator\LogicalOperatorResolver|null
     */
    private static $instance = null;

    /**
     * LogicalOperatorResolver Construct
     */
    private function __construct() {}

    /**
     * Retrieve the singleton instance of Operator Resolver
     *
     * @return \LogicTree\Resolver\Operator\LogicalOperatorResolver
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new LogicalOperatorResolver();
        }

        return self::$instance;
    }

    /**
     * {@inheritdoc}
     */
    protected function retrieveFullClassName(string $operator): string
    {
        return '\\LogicTree\\Operator\\Logical\\' . ucfirst($operator) . 'Operator';
    }
}
