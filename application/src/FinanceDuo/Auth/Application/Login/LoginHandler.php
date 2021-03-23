<?php

declare(strict_types=1);

namespace FinanceDuo\Auth\Application\Login;

use Exception;
use FinanceDuo\Auth\Application\LoginResponse;
use FinanceDuo\Users\Application\FinByEmail\UserByEmailFinder;
use FinanceDuo\Users\Domain\Email;
use FinanceDuo\Users\Domain\Password;
use Shared\Domain\Bus\Query\QueryHandler;

/**
 * Class LoginHandler
 * @package FinanceDuo\Auth\Application\Login
 */
class LoginHandler implements QueryHandler
{
    /**
     * @var UserLogin
     */
    private UserLogin $userLogin;

    /**
     * @var UserByEmailFinder
     */
    private UserByEmailFinder $userByEmailFinder;

    /**
     * LoginHandler constructor.
     * @param UserLogin $userLogin
     * @param UserByEmailFinder $userByEmailFinder
     */
    public function __construct(UserLogin $userLogin, UserByEmailFinder $userByEmailFinder) {
        $this->userLogin = $userLogin;
        $this->userByEmailFinder = $userByEmailFinder;
    }

    /**
     * @param LoginQuery $query
     * @return LoginResponse
     * @throws Exception
     */
    public function __invoke(LoginQuery $query): LoginResponse
    {
        $user = ($this->userByEmailFinder)(new Email($query->email()));

        $token = ($this->userLogin)($user, new Password($query->password()));

        return new LoginResponse($user, $token);
    }
}
