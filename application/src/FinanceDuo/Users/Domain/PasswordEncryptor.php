<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Domain;

/**
 * Interface PasswordEncryptor
 * @package FinanceDuo\Users\Domain
 */
interface PasswordEncryptor
{
    /**
     * @param string $password
     * @return Password
     */
    public function encrypt(string $password): Password;

    /**
     * @param Password $password
     * @param Password $hash
     * @return bool
     */
    public function verify(Password $password, Password $hash): bool;
}
