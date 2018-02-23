<?php
/**
 * Copyright © 2018 Uniwax, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace LogicTree\Model\AbstractModel;

use LogicTree\Model\ConditionInterface;

/**
 * Class AbstractCondition
 */
abstract class AbstractCondition implements ConditionInterface
{
    /**
     * @var \LogicTree\Model\ConditionInterface
     */
    private $parent;

    /**
     * {@inheritdoc}
     */
    public function getParent(): ConditionInterface
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function setParent(ConditionInterface $condition)
    {
        $this->parent = $condition;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasParent(): bool
    {
        return ($this->parent !== null);
    }
}
