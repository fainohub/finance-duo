<?php

declare(strict_types = 1);

namespace FinanceDuo\Expenses\Infrastructure\Doctrine;

use DateTime;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Exception;
use FinanceDuo\Expenses\Domain\PaidAt;
use Shared\Infrastructure\Persistence\Doctrine\Types\DateTimeType;

/**
 * Class EmailType
 * @package FinanceDuo\Expenses\Infrastructure\Doctrine;
 */
final class PaidAtType extends DateTimeType
{
    const NAME = 'paid_at';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return PaidAt
     * @throws Exception
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): PaidAt
    {
        return new PaidAt(new DateTime($value));
    }
}
