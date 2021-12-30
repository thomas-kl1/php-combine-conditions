<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Operator;

use LogicException;
use LogicTree\Operator\Comparator\EmptyOperator;
use LogicTree\Operator\Comparator\EqOperator;
use LogicTree\Operator\Comparator\GteqOperator;
use LogicTree\Operator\Comparator\GtOperator;
use LogicTree\Operator\Comparator\IdenOperator;
use LogicTree\Operator\Comparator\InIdenOperator;
use LogicTree\Operator\Comparator\InOperator;
use LogicTree\Operator\Comparator\LteqOperator;
use LogicTree\Operator\Comparator\LtOperator;
use LogicTree\Operator\Comparator\NeqOperator;
use LogicTree\Operator\Comparator\NidenOperator;
use LogicTree\Operator\Comparator\NinIdenOperator;
use LogicTree\Operator\Comparator\NinOperator;
use LogicTree\Operator\Comparator\NotNullOperator;
use LogicTree\Operator\Comparator\NullOperator;
use LogicTree\Operator\Comparator\RegexpOperator;
use LogicTree\Operator\Logical\AndOperator;
use LogicTree\Operator\Logical\NandOperator;
use LogicTree\Operator\Logical\NorOperator;
use LogicTree\Operator\Logical\OrOperator;
use LogicTree\Operator\Logical\XnorOperator;
use LogicTree\Operator\Logical\XorOperator;
use function array_map;
use function array_merge_recursive;
use function sprintf;

/**
 * @api
 */
final class OperatorPool
{
    public const TYPE_LOGICAL = 'logical';
    public const TYPE_COMPARATOR = 'comparator';

    /**
     * @var array[\LogicTree\Operator\OperatorInterface[]]
     */
    private array $operators = [];

    public static function defaultOperators(): array
    {
        return [
            OperatorType::Comparator->value => [
                EmptyOperator::CODE => EmptyOperator::class,
                EqOperator::CODE => EqOperator::class,
                GteqOperator::CODE => GteqOperator::class,
                GtOperator::CODE => GtOperator::class,
                IdenOperator::CODE => IdenOperator::class,
                InIdenOperator::CODE => InIdenOperator::class,
                InOperator::CODE => InOperator::class,
                LteqOperator::CODE => LteqOperator::class,
                LtOperator::CODE => LtOperator::class,
                NeqOperator::CODE => NeqOperator::class,
                NidenOperator::CODE => NidenOperator::class,
                NinIdenOperator::CODE => NinIdenOperator::class,
                NinOperator::CODE => NinOperator::class,
                NotNullOperator::CODE => NotNullOperator::class,
                NullOperator::CODE => NullOperator::class,
                RegexpOperator::CODE => RegexpOperator::class,
            ],
            OperatorType::Logical->value => [
                AndOperator::CODE => AndOperator::class,
                OrOperator::CODE => OrOperator::class,
                XorOperator::CODE => XorOperator::class,
                NandOperator::CODE => NandOperator::class,
                NorOperator::CODE => NorOperator::class,
                XnorOperator::CODE => XnorOperator::class,
            ],
        ];
    }

    public function __construct(array $operators = [])
    {
        $typeOperators = array_merge_recursive($this->retrieveDefaultOperators(), $operators);

        foreach ($typeOperators as $type => $operatorList) {
            foreach ($operatorList as $operatorCode => $operator) {
                $this->addOperator(OperatorType::from($type), $operatorCode, $operator);
            }
        }
    }

    public function getOperator(OperatorType $type, string $operatorCode): OperatorInterface
    {
        return $this->operators[$type->value][$operatorCode] ?? throw new LogicException(
            sprintf('No registered operator for the type "%s" and code "%s".', $type, $operatorCode)
        );
    }

    public function addOperator(OperatorType $type, string $operatorCode, OperatorInterface $operator): OperatorPool
    {
        $this->operators[$type->value][$operatorCode] = $operator;

        return $this;
    }

    private function retrieveDefaultOperators(): array
    {
        return array_map(
            static fn ($operators) => array_map(static fn ($operator) => new $operator(), $operators),
            static::defaultOperators()
        );
    }
}
