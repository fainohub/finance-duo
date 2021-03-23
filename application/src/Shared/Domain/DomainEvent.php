<?php

declare(strict_types=1);

namespace Shared\Domain;

use JsonSerializable;

/**
 * Class DomainEvent
 * @package Shared\Domain
 */
abstract class DomainEvent implements JsonSerializable
{
    /**
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
