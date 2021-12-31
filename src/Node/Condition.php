<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

final class Condition extends AbstractNode implements ConditionInterface
{
    public function __construct(
        private string $valueIdentifier,
        private string $operator,
        private mixed $valueCompare
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

    public function getValueCompare(): mixed
    {
        return $this->valueCompare;//ToDo: study to be fetched from datasource also?
    }

    public function setValueCompare(mixed $value): ConditionInterface
    {
        $this->valueCompare = $value;

        return $this;
    }
}
