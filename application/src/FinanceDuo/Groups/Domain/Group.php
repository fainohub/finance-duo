<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Domain;

use DateTime;
use Shared\Domain\Entity;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\Description;
use Shared\Domain\ValueObject\Name;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class Group
 * @package FinanceDuo\Groups\Domain
 */
class Group extends Entity
{
    /**
     * @var Uuid
     */
    private Uuid $id;

    /**
     * @var Name
     */
    private Name $name;

    /**
     * @var Description
     */
    private Description $description;

    /**
     * @var CreatedAt
     */
    private CreatedAt $createdAt;

    /**
     * @var UpdatedAt
     */
    private UpdatedAt $updatedAt;

    /**
     * Group constructor.
     * @param Uuid $id
     * @param Name $name
     * @param Description $description
     * @param CreatedAt $createdAt
     * @param UpdatedAt $updatedAt
     */
    public function __construct(
        Uuid $id,
        Name $name,
        Description $description,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param Uuid $id
     * @param Name $name
     * @param Description $description
     * @return static
     */
    public static function create(
        Uuid $id,
        Name $name,
        Description $description
    ): self {
        return new self(
            $id,
            $name,
            $description,
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
     * @return Name
     */
    public function name(): Name
    {
        return $this->name;
    }

    /**
     * @return Description
     */
    public function description(): Description
    {
        return $this->description;
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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id()->value(),
            'name' => $this->name()->value(),
            'description' => $this->description()->value(),
            'created_at' => $this->createdAt()->value(),
            'updated_at' => $this->updatedAt()->value()
        ];
    }
}
