<?php

declare(strict_types = 1);

namespace FinanceDuo\Users\Infrastructure\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use FinanceDuo\Users\Domain\Password;
use Shared\Infrastructure\Persistence\Doctrine\Types\StringType;

/**
 * Class PasswordType
 * @package FinanceDuo\Users\Infrastructure\Doctrine
 */
final class PasswordType extends StringType
{
    /**
     *
     */
    const NAME = 'password';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Password
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Password
    {
        return new Password($value);
    }
}
