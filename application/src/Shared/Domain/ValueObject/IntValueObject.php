<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

/**
 * Class IntValueObject
 * @package Shared\Domain\ValueObject
 */
abstract class IntValueObject
{
    /**
     * @var int
     */
    protected int $value;

    /**
     * IntValueObject constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}
