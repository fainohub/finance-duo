<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application\Find;

use FinanceDuo\Users\Domain\NotFoundUser;
use FinanceDuo\Users\Domain\User;
use FinanceDuo\Users\Domain\UserRepository;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class UserFinder
 * @package FinanceDuo\User\Application\Find
 */
class UserFinder
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UserFinder constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Uuid $id
     * @return User
     * @throws NotFoundUser
     */
    public function __invoke(Uuid $id): User
    {
        $user = $this->userRepository->findById($id);

        if ($user === null) {
            throw new NotFoundUser($id);
        }

        return $user;
    }
}
