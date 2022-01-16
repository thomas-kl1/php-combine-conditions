<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All right reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

/**
 * @api
 */
interface ConditionInterface extends NodeInterface
{
    /**
     * Retrieve the first value key identifier to compare
     *
     * @return ?string
     */
    public function getFirstValueIdentifier(): ?string;

    /**
     * Set the first value key identifier to compare
     *
     * @param ?string $identifier
     * @return self
     */
    public function setFirstValueIdentifier(?string $identifier): static;

    /**
     * Retrieve the first value to compare
     *
     * @return mixed
     */
    public function getFirstValue(): mixed;

    /**
     * Set the first value to compare
     *
     * @param mixed $value
     * @return self
     */
    public function setFirstValue(mixed $value): static;


    /**
     * Retrieve the second value key identifier to compare
     *
     * @return ?string
     */
    public function getSecondValueIdentifier(): ?string;

    /**
     * Set the second value key identifier to compare
     *
     * @param string $identifier
     * @return self
     */
    public function setSecondValueIdentifier(string $identifier): static;

    /**
     * Retrieve the second value to compare
     *
     * @return mixed
     */
    public function getSecondValue(): mixed;

    /**
     * Set the second value to compare
     *
     * @param mixed $value
     * @return self
     */
    public function setSecondValue(mixed $value): static;


}
