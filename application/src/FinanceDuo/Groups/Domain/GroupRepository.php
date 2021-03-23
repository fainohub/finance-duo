<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Domain;

use Shared\Domain\ValueObject\Uuid;

/**
 * Interface GroupRepository
 * @package FinanceDuo\Groups\Domain
 */
interface GroupRepository
{
    /**
     * @param Uuid $id
     * @return Group|null
     */
    public function findById(Uuid $id): ?Group;

    /**
     * @param Group $group
     */
    public function save(Group $group): void;
}
