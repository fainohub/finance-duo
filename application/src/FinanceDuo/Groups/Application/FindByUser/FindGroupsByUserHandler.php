<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Application\FindByUser;

use FinanceDuo\Users\Application\Find\UserFinder;
use FinanceDuo\Users\Domain\NotFoundUser;
use Shared\Domain\Bus\Query\QueryHandler;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class FindGroupsByUserHandler
 * @package FinanceDuo\Users\Application\FindGroups
 */
class FindGroupsByUserHandler implements QueryHandler
{
    /**
     * @var UserFinder
     */
    private UserFinder $userFinder;

    /**
     * @var GroupsByUserFinder
     */
    private GroupsByUserFinder $groupsByUserFinder;

    /**
     * FindGroupsByUserHandler constructor.
     * @param UserFinder $userFinder
     * @param GroupsByUserFinder $groupsByUserFinder
     */
    public function __construct(UserFinder $userFinder, GroupsByUserFinder $groupsByUserFinder)
    {
        $this->userFinder = $userFinder;
        $this->groupsByUserFinder = $groupsByUserFinder;
    }

    /**
     * @param FindGroupsByUserQuery $query
     * @return FindGroupsByUserResponse
     * @throws NotFoundUser
     */
    public function __invoke(FindGroupsByUserQuery $query): FindGroupsByUserResponse
    {
        $user = ($this->userFinder)(new Uuid($query->userId()));

        $groups = ($this->groupsByUserFinder)($user);

        return new FindGroupsByUserResponse($groups);
    }
}
