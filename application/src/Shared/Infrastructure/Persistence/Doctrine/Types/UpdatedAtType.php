<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use DateTime;
use Exception;
use Shared\Domain\ValueObject\UpdatedAt;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class UpdatedAtType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
final class UpdatedAtType extends DateTimeType
{
    /**
     *
     */
    const NAME = 'updated_at';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return UpdatedAt
     * @throws Exception
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): UpdatedAt
    {
        return new UpdatedAt(new DateTime($value));
    }
}
