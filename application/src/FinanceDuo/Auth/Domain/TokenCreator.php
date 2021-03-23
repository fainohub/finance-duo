<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Domain;

use FinanceDuo\Users\Domain\User;

/**
 * Interface TokenCreator
 * @package FinanceDuo\Auth\Domain
 */
interface TokenCreator
{
    /**
     * @param User $user
     * @return Token
     */
    public function __invoke(User $user): Token;
}
