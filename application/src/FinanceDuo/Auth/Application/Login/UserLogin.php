<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Application\Login;

use Exception;
use FinanceDuo\Auth\Domain\Token;
use FinanceDuo\Auth\Domain\TokenCreator;
use FinanceDuo\Users\Domain\Password;
use FinanceDuo\Users\Domain\PasswordEncryptor;
use FinanceDuo\Users\Domain\User;

/**
 * Class UserLogin
 * @package FinanceDuo\Auth\Application\Login
 */
class UserLogin
{
    /**
     * @var TokenCreator
     */
    private TokenCreator $tokenCreator;

    /**
     * @var PasswordEncryptor
     */
    private PasswordEncryptor $passwordEncryptor;

    /**
     * LoginHandler constructor.
     * @param TokenCreator $tokenCreator
     * @param PasswordEncryptor $passwordEncryptor
     */
    public function __construct(
        TokenCreator $tokenCreator,
        PasswordEncryptor $passwordEncryptor
    ) {
        $this->tokenCreator = $tokenCreator;
        $this->passwordEncryptor = $passwordEncryptor;
    }

    /**
     * @param User $user
     * @param Password $password
     * @return Token
     * @throws Exception
     */
    public function __invoke(User $user, Password $password): Token
    {
        if ($this->passwordEncryptor->verify($password, $user->password())) {
            return ($this->tokenCreator)($user);
        }

        throw new Exception('Email ou senha inválidos');
    }
}
