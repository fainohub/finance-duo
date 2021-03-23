<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Infrastructure;

use FinanceDuo\Users\Domain\Password;
use FinanceDuo\Users\Domain\PasswordEncryptor;

/**
 * Class LumenPasswordEncryptor
 * @package FinanceDuo\Users\Infrastructure\Lumen
 */
class PHPPasswordEncryptor implements PasswordEncryptor
{
    /**
     * @param string $password
     * @return Password
     */
    public function encrypt(string $password): Password
    {
        return new Password(password_hash($password, PASSWORD_BCRYPT));
    }

    /**
     * @param Password $password
     * @param Password $hash
     * @return bool
     */
    public function verify(Password $password, Password $hash): bool
    {
        return password_verify($password->value(), $hash->value());
    }
}
