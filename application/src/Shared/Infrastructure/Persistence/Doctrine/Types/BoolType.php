<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\BooleanType;

/**
 * Class BoolType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
abstract class BoolType extends BooleanType
{
    /**
     *
     */
    const NAME = 'boolean';

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
     * @return int
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): int
    {
        return true === $value ? 1 : 0;
    }
}
