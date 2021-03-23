<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Application\Authorize;

use FinanceDuo\Auth\Domain\Token;
use FinanceDuo\Auth\Domain\TokenDecoder;
use FinanceDuo\Users\Application\Find\UserFinder;
use FinanceDuo\Users\Domain\NotFoundUser;
use FinanceDuo\Users\Domain\User;

/**
 * Class TokenAuthorizer
 * @package FinanceDuo\Auth\Application\Authorize
 */
class TokenAuthorizer
{
    /**
     * @var TokenDecoder
     */
    private TokenDecoder $tokenDecoder;

    /**
     * @var UserFinder
     */
    private UserFinder $userFinder;

    /**
     * TokenAuthorizer constructor.
     * @param TokenDecoder $tokenDecoder
     * @param UserFinder $userFinder
     */
    public function __construct(TokenDecoder $tokenDecoder, UserFinder $userFinder)
    {
        $this->tokenDecoder = $tokenDecoder;
        $this->userFinder = $userFinder;
    }

    /**
     * @param Token $token
     * @return User
     * @throws NotFoundUser
     */
    public function __invoke(Token $token): User
    {
        $userId = ($this->tokenDecoder)($token);

        return ($this->userFinder)($userId);
    }
}
