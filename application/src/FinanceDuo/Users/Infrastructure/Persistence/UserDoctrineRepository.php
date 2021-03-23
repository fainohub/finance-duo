<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Infrastructure\Persistence;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;
use FinanceDuo\Users\Domain\Email;
use FinanceDuo\Users\Domain\User;
use FinanceDuo\Users\Domain\UserRepository;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class UserDoctrineRepository
 * @package FinanceDuo\Users\Infrastructure\Persistence
 */
class UserDoctrineRepository extends EntityRepository implements UserRepository
{
    /**
     * @param Uuid $id
     * @return User|null
     */
    public function findById(Uuid $id): ?User
    {
        $user = $this->findOneBy(['id' => $id->value()]);

        if ($user instanceof User) {
            return $user;
        }

        return null;
    }

    /**
     * @param Email $email
     * @return User|null
     */
    public function findByEmail(Email $email): ?User
    {
        $user = $this->findOneBy(['email' => $email->value()]);

        if ($user instanceof User) {
            return $user;
        }

        return null;
    }

    /**
     * @param User $user
     * @throws ORMException
     */
    public function save(User $user): void
    {
        $this->getEntityManager()->persist($user);
    }
}
