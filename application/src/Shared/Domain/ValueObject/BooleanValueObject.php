<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

/**
 * Class BooleanValueObject
 * @package Shared\Domain\ValueObject
 */
abstract class BooleanValueObject
{
    /**
     * @var bool
     */
    protected bool $value;

    /**
     * BooleanValueObject constructor.
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function value(): bool
    {
        return $this->value;
    }
}
