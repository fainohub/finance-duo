<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Domain;

/**
 * Class Token
 * @package FinanceDuo\Auth\Domain
 */
class Token
{
    /**
     * @var string
     */
    private string $value;

    /**
     * Token constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
