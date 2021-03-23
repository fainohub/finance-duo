<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Description;

/**
 * Class EmailType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
final class DescriptionType extends StringType
{
    const NAME = 'description';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Description
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Description
    {
        return new Description($value);
    }
}
