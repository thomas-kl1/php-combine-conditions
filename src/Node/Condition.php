<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

final class Condition extends AbstractNode implements ConditionInterface
{
    public function __construct(
        private ?string $firstValueIdentifier,
        private string $operator,
        private mixed $secondValue = null,
        private mixed $firstValue = null,
        private ?string $secondValueIdentifier = null,
    ) {
        $this->setFirstValueIdentifier($firstValueIdentifier);
        $this->setFirstValue($firstValue);
        $this->setOperator($operator);
        $this->setSecondValueIdentifier($secondValueIdentifier);
        $this->setSecondValue($secondValue);
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): static
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstValueIdentifier(): ?string
    {
        return $this->firstValueIdentifier;
    }

    /**
     * @param string|null $identifier
     * @return $this
     */
    public function setFirstValueIdentifier(?string $identifier): static
    {
        $this->firstValueIdentifier = $identifier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstValue(): mixed
    {
        return $this->firstValue;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setFirstValue(mixed $value): static
    {
        $this->firstValue = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecondValueIdentifier(): ?string
    {
        return $this->secondValueIdentifier;
    }

    /**
     * @param ?string $identifier
     * @return $this
     */
    public function setSecondValueIdentifier(?string $identifier): static
    {
        $this->secondValueIdentifier = $identifier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecondValue(): mixed
    {
        return $this->secondValue;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setSecondValue(mixed $value): static
    {
        $this->secondValue = $value;
        return $this;
    }
}
