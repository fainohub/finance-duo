<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use DateTime;

/**
 * Class DateTimeValueObject
 * @package Shared\Domain\ValueObject
 */
abstract class DateTimeValueObject
{
    /**
     * @var DateTime
     */
    protected DateTime $value;

    /**
     * DateTimeValueObject constructor.
     * @param DateTime $value
     */
    public function __construct(DateTime $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value->format('Y-m-d H:i:s');
    }

    /**
     * @return DateTime
     */
    public function dateTime(): DateTime
    {
        return $this->value;
    }
}
