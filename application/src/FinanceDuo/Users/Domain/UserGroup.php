<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Domain;

use FinanceDuo\Groups\Domain\Group;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class UserGroup
 * @package FinanceDuo\Users\Domain
 */
class UserGroup
{
    /**
     * @var Uuid
     */
    private Uuid $id;

    /**
     * @var User
     */
    private User $user;

    /**
     * @var Group
     */
    private Group $group;

    /**
     * @var Percentage
     */
    private Percentage $percentage;

    /**
     * UserGroup constructor.
     * @param Uuid $id
     * @param User $user
     * @param Group $group
     * @param Percentage $percentage
     */
    public function __construct(
        Uuid $id,
        User $user,
        Group $group,
        Percentage $percentage
    ) {
        $this->id = $id;
        $this->user = $user;
        $this->group = $group;
        $this->percentage = $percentage;
    }

    /**
     * @return Uuid
     */
    public function id(): Uuid
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * @return Group
     */
    public function group(): Group
    {
        return $this->group;
    }

    /**
     * @return Percentage
     */
    public function percentage(): Percentage
    {
        return $this->percentage;
    }
}
