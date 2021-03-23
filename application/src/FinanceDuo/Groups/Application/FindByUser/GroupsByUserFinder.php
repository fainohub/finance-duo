<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Application\FindByUser;

use FinanceDuo\Groups\Domain\Groups;
use FinanceDuo\Users\Domain\User;
use FinanceDuo\Users\Domain\UserGroup;

/**
 * Class GroupsByUserFinder
 * @package FinanceDuo\Groups\Application\FindByUser
 */
class GroupsByUserFinder
{
    /**
     * @param User $user
     * @return Groups
     */
    public function __invoke(User $user): Groups
    {
        $groups = new Groups();

        /**
         * @var UserGroup $userGroup
         */
        foreach ($user->groups() as $userGroup) {
            $groups->add($userGroup->group());
        }

        return $groups;
    }
}
