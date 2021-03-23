<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Application\Login;

use Shared\Domain\Bus\Query\Query;

/**
 * Class LoginCommand
 * @package FinanceDuo\Auth\Application\Login
 */
class LoginQuery implements Query
{
    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $password;

    /**
     * LoginCommand constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }
}
