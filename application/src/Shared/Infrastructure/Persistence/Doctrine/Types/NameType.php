<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Name;

/**
 * Class EmailType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
final class NameType extends StringType
{
    const NAME = 'name';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Name
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Name
    {
        return new Name($value);
    }
}
