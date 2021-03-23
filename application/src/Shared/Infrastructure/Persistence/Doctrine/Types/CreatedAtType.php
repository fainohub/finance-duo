<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence\Doctrine\Types;

use DateTime;
use Exception;
use Shared\Domain\ValueObject\CreatedAt;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class CreatedAtType
 * @package Shared\Infrastructure\Persistence\Doctrine\Types
 */
final class CreatedAtType extends DateTimeType
{
    /**
     *
     */
    const NAME = 'created_at';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return CreatedAt
     * @throws Exception
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): CreatedAt
    {
        return new CreatedAt(new DateTime($value));
    }
}
