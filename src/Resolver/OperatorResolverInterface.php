<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Resolver;

use LogicTree\Operator\OperatorInterface;

/**
 * Interface ResolverInterface
 * @api
 */
interface OperatorResolverInterface
{
    /**
     * Resolve the operator instance
     *
     * @param string $operator
     * @return \LogicTree\Operator\OperatorInterface
     */
    public function resolve(string $operator): OperatorInterface;
}
