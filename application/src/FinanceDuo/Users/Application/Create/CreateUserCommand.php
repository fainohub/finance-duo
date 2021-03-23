<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application\Create;

use Shared\Domain\Bus\Command\Command;

/**
 * Class CreateUserCommand
 * @package FinanceDuo\Users\Application\Create
 */
class CreateUserCommand implements Command
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var string
     */
    private string $username;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $password;

    /**
     * CreateUserCommand constructor.
     * @param string $id
     * @param string $username
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(string $id, string $username, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }
}
