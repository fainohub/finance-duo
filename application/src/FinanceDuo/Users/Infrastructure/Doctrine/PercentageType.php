<?php

declare(strict_types = 1);

namespace FinanceDuo\Users\Infrastructure\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use FinanceDuo\Users\Domain\Percentage;
use Shared\Infrastructure\Persistence\Doctrine\Types\StringType;

/**
 * Class PercentageType
 * @package FinanceDuo\Users\Infrastructure\Doctrine;
 */
final class PercentageType extends StringType
{
    const NAME = 'percentage';

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return Percentage
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Percentage
    {
        return new Percentage((float) $value);
    }
}
