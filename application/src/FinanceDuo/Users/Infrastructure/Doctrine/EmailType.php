<?php

declare(strict_types = 1);

namespace FinanceDuo\Users\Infrastructure\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use FinanceDuo\Users\Domain\Email;
use Shared\Infrastructure\Persistence\Doctrine\Types\StringType;

/**
 * Class EmailType
 * @package FinanceDuo\Users\Infrastructure\Doctrine
 */
final class EmailType extends StringType
{
    /**
     *
     */
    const NAME = 'email';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Email
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Email
    {
        return new Email($value);
    }
}
