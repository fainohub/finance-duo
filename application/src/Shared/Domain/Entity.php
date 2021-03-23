<?php

declare(strict_types=1);

namespace Shared\Domain;

use JsonSerializable;

/**
 * Class Entity
 * @package Shared\Domain
 */
abstract class Entity implements JsonSerializable
{
    /**
     * @var DomainEvents
     */
    private DomainEvents $domainEvents;

    /**
     * @param DomainEvent $domainEvent
     */
    protected function record(DomainEvent $domainEvent): void
    {
        $this->domainEvents->add($domainEvent);
    }

    /**
     * @return DomainEvents
     */
    public function pullDomainEvents(): DomainEvents
    {
        $domainEvents = $this->domainEvents;
        $this->domainEvents = new DomainEvents();

        return $domainEvents;
    }

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
