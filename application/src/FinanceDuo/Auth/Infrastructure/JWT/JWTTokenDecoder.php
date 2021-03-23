<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Infrastructure\JWT;

use FinanceDuo\Auth\Domain\Token;
use FinanceDuo\Auth\Domain\TokenDecoder;
use Firebase\JWT\JWT;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class JWTTokenDecoder
 * @package FinanceDuo\Auth\Infrastructure\JWT
 */
class JWTTokenDecoder implements TokenDecoder
{
    /**
     * @param Token $token
     * @return Uuid
     */
    public function __invoke(Token $token): Uuid
    {
        $decoded = (array) JWT::decode($token->value(), config('auth.jwt_key'), array('HS256'));

        return new Uuid($decoded['user_id']);
    }
}
