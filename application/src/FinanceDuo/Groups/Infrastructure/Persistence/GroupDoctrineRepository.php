<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Infrastructure\Persistence;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;
use FinanceDuo\Groups\Domain\Group;
use FinanceDuo\Groups\Domain\GroupRepository;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class GroupDoctrineRepository
 * @package FinanceDuo\Groups\Infrastructure\Persistence
 */
class GroupDoctrineRepository extends EntityRepository implements GroupRepository
{
    /**
     * @param Uuid $id
     * @return Group|null
     */
    public function findById(Uuid $id): ?Group
    {
        $group = $this->findOneBy(['id' => $id->value()]);

        if ($group instanceof Group) {
            return $group;
        }

        return null;
    }

    /**
     * @param Group $group
     * @throws ORMException
     */
    public function save(Group $group): void
    {
        $this->getEntityManager()->persist($group);
    }
}
