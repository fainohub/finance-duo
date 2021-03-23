<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application\Create;

use FinanceDuo\Users\Domain\Email;
use FinanceDuo\Users\Domain\PasswordEncryptor;
use FinanceDuo\Users\Domain\Username;
use Shared\Domain\Bus\Command\CommandHandler;
use Shared\Domain\ValueObject\Name;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class CreateUserHandler
 * @package FinanceDuo\Users\Application\Create
 */
class CreateUserHandler implements CommandHandler
{
    /**
     * @var UserCreator
     */
    private UserCreator $userCreator;

    /**
     * @var PasswordEncryptor
     */
    private PasswordEncryptor $passwordEncryptor;

    /**
     * CreateUserHandler constructor.
     * @param UserCreator $userCreator
     * @param PasswordEncryptor $passwordEncryptor
     */
    public function __construct(UserCreator $userCreator, PasswordEncryptor $passwordEncryptor)
    {
        $this->userCreator = $userCreator;
        $this->passwordEncryptor = $passwordEncryptor;
    }

    /**
     * @param CreateUserCommand $command
     */
    public function __invoke(CreateUserCommand $command)
    {
        $password = $this->passwordEncryptor->encrypt($command->password());

        ($this->userCreator)(
            new Uuid($command->id()),
            new Username($command->username()),
            new Name($command->name()),
            new Email($command->email()),
            $password
        );
    }
}
