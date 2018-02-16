<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Resolver\Operator;

use LogicTree\Operator\OperatorInterface;
use LogicTree\Resolver\OperatorResolverInterface;

/**
 * Class AbstractOperatorResolver
 */
abstract class AbstractOperatorResolver implements OperatorResolverInterface
{
    /**
     * @var \LogicTree\Operator\OperatorInterface[]
     */
    private $operators = [];

    /**
     * Retrieve the operator class
     *
     * @param string $operator
     * @return \LogicTree\Operator\OperatorInterface
     */
    public function resolve(string $operator): OperatorInterface
    {
        if (!isset($this->operators[$operator])) {
            $operatorClass = $this->retrieveFullClassName($operator);
            $this->operators[$operator] = new $operatorClass();
        }

        return $this->operators[$operator];
    }

    /**
     * Retrieve the namespace to use to instantiate the operator class
     *
     * @param string $operator
     * @return string
     */
    abstract protected function retrieveFullClassName(string $operator): string;
}
