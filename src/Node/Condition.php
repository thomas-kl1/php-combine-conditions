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

    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }

    public function getValueIdentifier(): string
    {
        return $this->valueIdentifier;
    }

    public function setValueIdentifier(string $identifier): void
    {
        $this->valueIdentifier = $identifier;
    }

    public function getValueCompare(): mixed
    {
        return $this->valueCompare;//ToDo: study to be fetched from datasource also?
    }

    public function setValueCompare(mixed $value): void
    {
        $this->valueCompare = $value;
    }
}
