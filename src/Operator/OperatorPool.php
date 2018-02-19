<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
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
    const TYPE_LOGICAL = 'logical';
    const TYPE_COMPARATOR = 'comparator';

    /**
     * @var array
     */
    private $defaultOperators = [
        self::TYPE_COMPARATOR => [
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
        self::TYPE_LOGICAL => [
            AndOperator::CODE => AndOperator::class,
            OrOperator::CODE => OrOperator::class,
            XorOperator::CODE => XorOperator::class,
            NandOperator::CODE => NandOperator::class,
            NorOperator::CODE => NorOperator::class,
            XnorOperator::CODE => XnorOperator::class,
        ],
    ];

    /**
     * @var \LogicTree\Operator\OperatorInterface[]
     */
    private $operators = [];

    /**
     * @param array $operators
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
     * @param $operatorCode
     * @return \LogicTree\Operator\OperatorInterface
     */
    public function getOperator(string $type, $operatorCode): OperatorInterface
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
     * @param string $operator
     * @return \LogicTree\Operator\OperatorPool
     */
    public function addOperator(string $type, string $operatorCode, string $operator): self
    {
        if (!isset($this->operators[$type], $this->operators[$type][$operatorCode])) {
            if (!($operator instanceof OperatorInterface)) {
                throw new \LogicException(get_class($operator) . ' doesn\'t implement ' . OperatorInterface::class);
            }
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
        $operators = [];

        foreach ($this->defaultOperators as $type => $typeOperators) {
            foreach ($typeOperators as $operatorCode => $operator) {
                if (!isset($operators[$type])) {
                    $operators[$type] = [];
                }
                $operators[$type][$operatorCode] = new $operator();
            }
        }

        return $operators;
    }
}
