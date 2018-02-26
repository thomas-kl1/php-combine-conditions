<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Node;

/**
 * Class Condition
 */
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

    /**
     * @param string $valueIdentifier
     * @param string $operator
     * @param mixed $valueCompare
     */
    public function __construct(
        string $valueIdentifier,
        string $operator,
        mixed $valueCompare
    ) {
        $this->setValueIdentifier($valueIdentifier);
        $this->setOperator($operator);
        $this->setValueCompare($valueCompare);
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
    public function setOperator(string $operator): ConditionInterface
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValueIdentifier(): string
    {
        return $this->valueIdentifier;
    }

    /**
     * {@inheritdoc}
     */
    public function setValueIdentifier(string $identifier): ConditionInterface
    {
        $this->valueIdentifier = $identifier;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValueCompare(): mixed
    {
        return $this->valueCompare;
    }

    /**
     * {@inheritdoc}
     */
    public function setValueCompare(mixed $value): ConditionInterface
    {
        $this->valueCompare = $value;
        return $this;
    }
}
