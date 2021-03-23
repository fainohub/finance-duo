<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

/**
 * Class StringValueObject
 * @package Shared\Domain\ValueObject
 */
abstract class StringValueObject
{
    /**
     * @var string
     */
    protected string $value;

    /**
     * StringValueObject constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
    }
}
