<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Domain;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Shared\Domain\Entity;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\Name;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class User
 * @package FinanceDuo\Users\Domain
 */
class User extends Entity
{
    /**
     * @var Uuid
     */
    private Uuid $id;

    /**
     * @var Username
     */
    private Username $username;

    /**
     * @var Name
     */
    private Name $name;

    /**
     * @var Email
     */
    private Email $email;

    /**
     * @var Password
     */
    private Password $password;

    /**
     * @var CreatedAt
     */
    private CreatedAt $createdAt;

    /**
     * @var UpdatedAt
     */
    private UpdatedAt $updatedAt;

    /**
     * @var
     */
    private $groups;

    /**
     * User constructor.
     * @param Uuid $id
     * @param Username $username
     * @param Name $name
     * @param Email $email
     * @param Password $password
     * @param CreatedAt $createdAt
     * @param UpdatedAt $updatedAt
     */
    public function __construct(
        Uuid $id,
        Username $username,
        Name $name,
        Email $email,
        Password $password,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        $this->groups = new ArrayCollection();
    }

    /**
     * @param Uuid $id
     * @param Username $username
     * @param Name $name
     * @param Email $email
     * @param Password $password
     * @return static
     */
    public static function create(
        Uuid $id,
        Username $username,
        Name $name,
        Email $email,
        Password $password
    ): self {
        return new self(
            $id,
            $username,
            $name,
            $email,
            $password,
            new CreatedAt(new DateTime()),
            new UpdatedAt(new DateTime())
        );
    }

    /**
     * @return Uuid
     */
    public function id(): Uuid
    {
        return $this->id;
    }

    /**
     * @return Username
     */
    public function username(): Username
    {
        return $this->username;
    }

    /**
     * @return Name
     */
    public function name(): Name
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function email(): Email
    {
        return $this->email;
    }

    /**
     * @return Password
     */
    public function password(): Password
    {
        return $this->password;
    }

    /**
     * @return CreatedAt
     */
    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    /**
     * @return UpdatedAt
     */
    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    /**
     * @param UserGroup $group
     */
    public function addGroup(UserGroup $group): void
    {
        $this->groups->add($group);
    }

    public function groups(): Collection
    {
        return $this->groups;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id()->value(),
            'username' => $this->username()->value(),
            'name' => $this->name()->value(),
            'email' => $this->email()->value(),
            'avatar' => 'https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg',
            'created_at' => $this->createdAt()->value(),
            'updated_at' => $this->updatedAt()->value()
        ];
    }
}
