<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application\Create;

use FinanceDuo\Users\Domain\Email;
use FinanceDuo\Users\Domain\Password;
use FinanceDuo\Users\Domain\User;
use FinanceDuo\Users\Domain\Username;
use FinanceDuo\Users\Domain\UserRepository;
use Shared\Domain\ValueObject\Name;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class UserCreator
 * @package FinanceDuo\Users\Application\Create
 */
class UserCreator
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UserCreator constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Uuid $id
     * @param Username $username
     * @param Name $name
     * @param Email $email
     * @param Password $password
     */
    public function __invoke(
        Uuid $id,
        Username $username,
        Name $name,
        Email $email,
        Password $password
    ): void {
        $user = User::create(
            $id,
            $username,
            $name,
            $email,
            $password
        );

        $this->userRepository->save($user);
    }
}
