<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use DateTime;

final class CreatedAt extends DateTimeValueObject
{
    public static function create(): self
    {
        return new self(new DateTime());
    }
}
