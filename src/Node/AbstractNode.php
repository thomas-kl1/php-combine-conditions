<?php declare(strict_types=1);
/**
 * Copyright © Thomas Klein, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */

namespace LogicTree\Node;

abstract class AbstractNode implements NodeInterface
{
    private ?CombineInterface $parent = null;

    public function getParent(): ?CombineInterface
    {
        return $this->parent;
    }

    public function setParent(?CombineInterface $combine): static
    {
        $this->parent = $combine;

        return $this;
    }

    public function hasParent(): bool
    {
        return $this->parent !== null;
    }
}
