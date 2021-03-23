<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Domain;

use Shared\Domain\ValueObject\Uuid;

/**
 * Interface TokenDecoder
 * @package FinanceDuo\Auth\Domain
 */
interface TokenDecoder
{
    /**
     * @param Token $token
     * @return Uuid
     */
    public function __invoke(Token $token): Uuid;
}
