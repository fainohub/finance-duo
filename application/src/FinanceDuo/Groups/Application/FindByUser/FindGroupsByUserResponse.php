<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Application\FindByUser;

use FinanceDuo\Groups\Domain\Group;
use FinanceDuo\Groups\Domain\Groups;
use Shared\Domain\Bus\ResponseInterface;

/**
 * Class FindGroupsByUserResponse
 * @package FinanceDuo\Groups\Application\FindByUser
 */
class FindGroupsByUserResponse implements ResponseInterface
{
    /**
     * @var Groups
     */
    private Groups $groups;

    /**
     * FindGroupsByUserResponse constructor.
     * @param Groups $groups
     */
    public function __construct(Groups $groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return Groups
     */
    public function groups(): Groups
    {
        return $this->groups;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [];

        /**
         * @var Group $group
         */
        foreach ($this->groups() as $group) {
            $data['groups'][] = [
                'id' => $group->id()->value(),
                'name' => $group->name()->value()
            ];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
