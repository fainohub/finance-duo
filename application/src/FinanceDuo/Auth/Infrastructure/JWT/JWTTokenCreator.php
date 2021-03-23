<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Infrastructure\JWT;

use FinanceDuo\Auth\Domain\Token;
use FinanceDuo\Auth\Domain\TokenCreator;
use FinanceDuo\Users\Domain\User;
use Firebase\JWT\JWT;

/**
 * Class JWTTokenCreator
 * @package FinanceDuo\Auth\Infrastructure\JWT
 */
class JWTTokenCreator implements TokenCreator
{
    /**
     * @param User $user
     * @return Token
     */
    public function __invoke(User $user): Token
    {
        $payload = [
            'user_id' => $user->id()->value()
        ];

        $jwtToken = JWT::encode($payload, config('auth.jwt_key'));

        return new Token($jwtToken);
    }
}
