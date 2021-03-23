<?php

declare(strict_types=1);

namespace Shared\Domain\Bus;

abstract class Response implements ResponseInterface
{
    abstract public function toArray(): array;

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
