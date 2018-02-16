<?php
/**
 * Copyright © 2018 Thomas Klein, All rights reserved.
 */
declare(strict_types=1);

namespace LogicTree\Model;

/**
 * Class Condition
 */
final class Condition implements ConditionInterface
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

    /**
     * Retrieve the value key identifier to compare
     *
     * @return string
     */
    public function getValueIdentifier(): string
    {
        return $this->valueIdentifier;
    }

    /**
     * Set the value key identifier to compare
     *
     * @param string $identifier
     * @return \LogicTree\Model\Condition
     */
    public function setValueIdentifier(string $identifier): self
    {
        $this->valueIdentifier = $identifier;
        return $this;
    }

    /**
     * Retrieve the value to compare
     *
     * @return mixed
     */
    public function getValueCompare(): mixed
    {
        return $this->valueCompare;
    }

    /**
     * Set the value to compare
     *
     * @param mixed $value
     * @return \LogicTree\Model\Condition
     */
    public function setValueCompare(mixed $value): self
    {
        $this->valueCompare = $value;
        return $this;
    }
}
