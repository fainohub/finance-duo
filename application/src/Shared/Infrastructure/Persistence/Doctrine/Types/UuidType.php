<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class UuidType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
final class UuidType extends StringType
{
    /**
     *
     */
    const NAME = 'uuid';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Uuid
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Uuid
    {
        return new Uuid($value);
    }
}
