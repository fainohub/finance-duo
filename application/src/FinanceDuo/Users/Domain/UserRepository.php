<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Domain;

use Shared\Domain\ValueObject\Uuid;

/**
 * Interface UserRepository
 * @package FinanceDuo\Users\Domain
 */
interface UserRepository
{
    /**
     * @param Uuid $id
     * @return User|null
     */
    public function findById(Uuid $id): ?User;

    /**
     * @param Email $email
     * @return User|null
     */
    public function findByEmail(Email $email): ?User;

    /**
     * @param User $user
     */
    public function save(User $user): void;
}
