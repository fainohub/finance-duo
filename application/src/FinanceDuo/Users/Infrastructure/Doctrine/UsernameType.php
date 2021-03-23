<?php

declare(strict_types = 1);

namespace FinanceDuo\Users\Infrastructure\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use FinanceDuo\Users\Domain\Username;
use Shared\Infrastructure\Persistence\Doctrine\Types\StringType;

/**
 * Class EmailType
 * @package FinanceDuo\Users\Infrastructure\Doctrine;
 */
final class UsernameType extends StringType
{
    const NAME = 'username';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Username
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Username
    {
        return new Username($value);
    }
}
