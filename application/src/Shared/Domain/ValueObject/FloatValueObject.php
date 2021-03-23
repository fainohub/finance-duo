<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

/**
 * Class FloatValueObject
 * @package Shared\Domain\ValueObject
 */
abstract class FloatValueObject
{
    /**
     * @var float
     */
    protected float $value;

    /**
     * FloatValueObject constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function value(): float
    {
        return $this->value;
    }
}
