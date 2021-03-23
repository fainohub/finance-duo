<?php

declare(strict_types = 1);

namespace FinanceDuo\Expenses\Infrastructure\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use FinanceDuo\Expenses\Domain\Amount;
use Shared\Infrastructure\Persistence\Doctrine\Types\FloatType;

/**
 * Class EmailType
 * @package FinanceDuo\Expenses\Infrastructure\Doctrine;
 */
final class AmountType extends FloatType
{
    const NAME = 'amount';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Amount
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Amount
    {
        return new Amount((float) $value);
    }
}
