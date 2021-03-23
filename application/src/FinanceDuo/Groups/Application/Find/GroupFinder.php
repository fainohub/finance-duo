<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Application\Find;

use FinanceDuo\Groups\Domain\Group;
use FinanceDuo\Groups\Domain\GroupRepository;
use FinanceDuo\Groups\Domain\NotFoundGroup;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class GroupFinder
 * @package FinanceDuo\Groups\Application\Find
 */
class GroupFinder
{
    /**
     * @var GroupRepository
     */
    private GroupRepository $groupRepository;

    /**
     * GroupFinder constructor.
     * @param GroupRepository $groupRepository
     */
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param Uuid $id
     * @return Group
     * @throws NotFoundGroup
     */
    public function __invoke(Uuid $id): Group
    {
        $group = $this->groupRepository->findById($id);

        if ($group === null) {
            throw new NotFoundGroup($id);
        }

        return $group;
    }
}
