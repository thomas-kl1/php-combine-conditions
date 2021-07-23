<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

final class Condition extends AbstractNode implements ConditionInterface
{
    /**
     * @var string
     */
    private $operator;

    /**
     * @var string
     */
    private $valueIdentifier;

    /**
     * @var mixed
     */
    private $valueCompare;

    public function __construct(
        string $valueIdentifier,
        string $operator,
        $valueCompare
    ) {
        $this->setValueIdentifier($valueIdentifier);
        $this->setOperator($operator);
        $this->setValueCompare($valueCompare);
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): ConditionInterface
    {
        $this->operator = $operator;

        return $this;
    }

    public function getValueIdentifier(): string
    {
        return $this->valueIdentifier;
    }

    public function setValueIdentifier(string $identifier): ConditionInterface
    {
        $this->valueIdentifier = $identifier;

        return $this;
    }

    public function getValueCompare()
    {
        return $this->valueCompare;
    }

    public function setValueCompare($value): ConditionInterface
    {
        $this->valueCompare = $value;

        return $this;
    }
}
