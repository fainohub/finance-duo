<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeType as DoctrineDateTimeType;

/**
 * Class DateTimeType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
abstract class DateTimeType extends DoctrineDateTimeType
{
    /**
     *
     */
    const NAME = 'datetime';

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::NAME;
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return mixed|string|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        return is_string($value) ? $value : $value->value();
    }
}
