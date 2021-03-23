<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class IntType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
abstract class FloatType extends \Doctrine\DBAL\Types\FloatType
{
    /**
     *
     */
    const NAME = 'float';

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
     * @return float|mixed
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): float
    {
        return is_float($value) ? $value : $value->value();
    }
}
