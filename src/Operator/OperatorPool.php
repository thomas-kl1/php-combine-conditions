<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Operator;

use LogicTree\Operator\Comparator\EmptyOperator;
use LogicTree\Operator\Comparator\EqOperator;
use LogicTree\Operator\Comparator\GteqOperator;
use LogicTree\Operator\Comparator\GtOperator;
use LogicTree\Operator\Comparator\IdenOperator;
use LogicTree\Operator\Comparator\LteqOperator;
use LogicTree\Operator\Comparator\LtOperator;
use LogicTree\Operator\Comparator\NeqOperator;
use LogicTree\Operator\Comparator\NidenOperator;
use LogicTree\Operator\Comparator\NullOperator;
use LogicTree\Operator\Comparator\RegexpOperator;
use LogicTree\Operator\Logical\AndOperator;
use LogicTree\Operator\Logical\NandOperator;
use LogicTree\Operator\Logical\NorOperator;
use LogicTree\Operator\Logical\OrOperator;
use LogicTree\Operator\Logical\XnorOperator;
use LogicTree\Operator\Logical\XorOperator;

/**
 * Class OperatorPool
 * @api
 */
final class OperatorPool
{
    public const TYPE_LOGICAL = 'logical';
    public const TYPE_COMPARATOR = 'comparator';

    /**
     * Default operators code and class name listed by types
     *
     * @var array
     */
    private $defaultOperators = [
        OperatorPool::TYPE_COMPARATOR => [
            EmptyOperator::CODE => EmptyOperator::class,
            EqOperator::CODE => EqOperator::class,
            GteqOperator::CODE => GteqOperator::class,
            GtOperator::CODE => GtOperator::class,
            IdenOperator::CODE => IdenOperator::class,
            LteqOperator::CODE => LteqOperator::class,
            LtOperator::CODE => LtOperator::class,
            NeqOperator::CODE => NeqOperator::class,
            NidenOperator::CODE => NidenOperator::class,
            NullOperator::CODE => NullOperator::class,
            RegexpOperator::CODE => RegexpOperator::class,
        ],
        OperatorPool::TYPE_LOGICAL => [
            AndOperator::CODE => AndOperator::class,
            OrOperator::CODE => OrOperator::class,
            XorOperator::CODE => XorOperator::class,
            NandOperator::CODE => NandOperator::class,
            NorOperator::CODE => NorOperator::class,
            XnorOperator::CODE => XnorOperator::class,
        ],
    ];

    /**
     * Operators list
     *
     * @var \LogicTree\Operator\OperatorInterface[]
     */
    private $operators = [];

    /**
     * OperatorPool constructor
     *
     * @param array $operators Operators object listed by types
     */
    public function __construct(array $operators = [])
    {
        $typeOperators = array_replace_recursive($this->retrieveDefaultOperators(), $operators);

        foreach ($typeOperators as $type => $operators) {
            foreach ($operators as $operatorCode => $operator) {
                $this->addOperator($type, $operatorCode, $operator);
            }
        }
    }

    /**
     * Retrieve an operator by its type and code
     *
     * @param string $type
     * @param string $operatorCode
     * @return \LogicTree\Operator\OperatorInterface
     */
    public function getOperator(string $type, string $operatorCode): OperatorInterface
    {
        if (!isset($this->operators[$type], $this->operators[$type][$operatorCode])) {
            throw new \LogicException(
                sprintf('No registered operator for the type "%s" and code "%s".', $type, $operatorCode)
            );
        }

        return $this->operators[$type][$operatorCode];
    }

    /**
     * Add an operator by its type and code
     *
     * @param string $type
     * @param string $operatorCode
     * @param \LogicTree\Operator\OperatorInterface $operator
     * @return \LogicTree\Operator\OperatorPool
     */
    public function addOperator(string $type, string $operatorCode, OperatorInterface $operator): OperatorPool
    {
        if (!isset($this->operators[$type], $this->operators[$type][$operatorCode])) {
            if (!isset($this->operators[$type])) {
                $this->operators[$type] = [];
            }

            $this->operators[$type][$operatorCode] = $operator;
        }

        return $this;
    }

    /**
     * Retrieve the default instantiated operators
     *
     * @return array
     */
    private function retrieveDefaultOperators(): array
    {
        return array_map(function ($operators) {
            return array_map(function ($operator) {
                return new $operator();
            }, $operators);
        }, $this->defaultOperators);
    }
}
