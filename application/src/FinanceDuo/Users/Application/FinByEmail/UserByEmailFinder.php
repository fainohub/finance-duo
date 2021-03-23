<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application\FinByEmail;

use FinanceDuo\Users\Domain\Email;
use FinanceDuo\Users\Domain\User;
use FinanceDuo\Users\Domain\UserRepository;

/**
 * Class UserByEmailFinder
 * @package FinanceDuo\Users\Application\FinByEmail
 */
class UserByEmailFinder
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UserByEmailFinder constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Email $email
     * @return User|null
     */
    public function __invoke(Email $email): ?User
    {
        return $this->userRepository->findByEmail($email);
    }
}
