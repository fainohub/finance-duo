<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

/**
 * Class IntType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
abstract class IntType extends IntegerType
{
    /**
     *
     */
    const NAME = 'integer';

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
     * @return int|mixed
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): int
    {
        return is_int($value) ? $value : $value->value();
    }
}
