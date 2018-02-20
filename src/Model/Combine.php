<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Model;

use LogicTree\Model\AbstractModel\AbstractCombine;

/**
 * Class Combine
 */
final class Combine extends AbstractCombine implements ConditionInterface
{
    /**
     * @var string
     */
    private $operator;

    /**
     * @var bool
     */
    private $isInvert;

    /**
     * @param string $operator
     * @param bool $isInvert [optional] Is false by default.
     * @param \LogicTree\Model\ConditionInterface[] $conditions [optional] Is empty by default.
     */
    public function __construct(
        string $operator,
        bool $isInvert = false,
        array $conditions = []
    ) {
        parent::__construct();
        $this->setOperator($operator);
        $this->setIsInvert($isInvert);
        $this->setConditions($conditions);
    }

    /**
     * Add a logic structure as condition or combination
     *
     * @param \LogicTree\Model\ConditionInterface $condition
     * @return \LogicTree\Model\Combine
     */
    public function addCondition(ConditionInterface $condition): self
    {
        $condition->setParent($this);
        $this->items[] = $condition;
        return $this;
    }

    /**
     * Set the logic structure as conditions or combinations
     *
     * @param \LogicTree\Model\ConditionInterface[] $conditions
     * @return \LogicTree\Model\Combine
     */
    public function setConditions(array $conditions): self
    {
        $this->items = [];
        foreach ($conditions as $condition) {
            $this->addCondition($condition);
        }
        return $this;
    }

    /**
     * Check if the result should be inverted
     *
     * @return bool
     */
    public function isInvert(): bool
    {
        return $this->isInvert;
    }

    /**
     * Set is result of combination inverted
     *
     * @param bool $isInvert
     * @return \LogicTree\Model\Combine
     */
    public function setIsInvert(bool $isInvert): self
    {
        $this->isInvert = $isInvert;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * {@inheritdoc}
     */
    public function setOperator(string $operator): self
    {
        $this->operator = $operator;
        return $this;
    }
}
