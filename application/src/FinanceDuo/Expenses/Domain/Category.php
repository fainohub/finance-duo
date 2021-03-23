<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Domain;

use DateTime;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\Name;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

class Category
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
     * @param CreatedAt $createdAt
     * @param UpdatedAt $updatedAt
     */
    public function __construct(
        Uuid $id,
        Name $name,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param Uuid $id
     * @param Name $name
     * @return static
     */
    public static function create(
        Uuid $id,
        Name $name
    ): self {
        return new self(
            $id,
            $name,
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
            'created_at' => $this->createdAt()->value(),
            'updated_at' => $this->updatedAt()->value()
        ];
    }
}
