<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application\Find;

use FinanceDuo\Users\Application\UserResponse;
use FinanceDuo\Users\Domain\NotFoundUser;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class FindUserHandler
 * @package FinanceDuo\Users\Application\Find
 */
class FindUserHandler
{
    /**
     * @var UserFinder
     */
    private UserFinder $userFinder;

    /**
     * FindUserHandler constructor.
     * @param UserFinder $userFinder
     */
    public function __construct(UserFinder $userFinder)
    {
        $this->userFinder = $userFinder;
    }

    /**
     * @param FindUserQuery $query
     * @return UserResponse
     * @throws NotFoundUser
     */
    public function __invoke(FindUserQuery $query): UserResponse
    {
        $user = ($this->userFinder)(new Uuid($query->id()));

        return new UserResponse($user);
    }
}
