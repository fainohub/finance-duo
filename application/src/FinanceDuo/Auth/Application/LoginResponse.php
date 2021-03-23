<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Application;

use FinanceDuo\Auth\Domain\Token;
use FinanceDuo\Users\Domain\User;
use Shared\Domain\Bus\ResponseInterface;

/**
 * Class LoginResponse
 * @package FinanceDuo\Auth\Application
 */
class LoginResponse implements ResponseInterface
{
    /**
     * @var User
     */
    private User $user;

    /**
     * @var Token
     */
    private Token $token;

    /**
     * LoginResponse constructor.
     * @param User $user
     * @param Token $token
     */
    public function __construct(User $user, Token $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * @return Token
     */
    public function token(): Token
    {
        return $this->token;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'user' => [
                'name' => $this->user()->name()->value(),
                'username' => $this->user()->username()->value(),
                'email' => $this->user()->email()->value(),
                'token' => $this->token()->value()
            ]
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
