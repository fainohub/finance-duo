<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use DateTime;

final class UpdatedAt extends DateTimeValueObject
{
    public static function create(): self
    {
        return new self(new DateTime());
    }
}
