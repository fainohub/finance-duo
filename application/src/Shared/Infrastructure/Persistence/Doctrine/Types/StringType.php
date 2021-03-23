<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType as DoctrineStringType;

/**
 * Class StringType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
abstract class StringType extends DoctrineStringType
{
    /**
     *
     */
    const NAME = 'string';

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
     * @return mixed|string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return is_string($value) ? $value : $value->value();
    }
}
