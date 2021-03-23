<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Domain;

use DateTime;
use FinanceDuo\Groups\Domain\Group;
use FinanceDuo\Users\Domain\User;
use Shared\Domain\Entity;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\Description;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class Expenses
 * @package FinanceDuo\Expenses\Domain
 */
class Expense extends Entity
{
    /**
     * @var Uuid
     */
    private Uuid $id;

    /**
     * @var User
     */
    private User $user;

    /**
     * @var Group
     */
    private Group $group;

    /**
     * @var Category
     */
    private Category $category;

    /**
     * @var Description
     */
    private Description $description;

    /**
     * @var Amount
     */
    private Amount $amount;

    /**
     * @var PaidAt
     */
    private PaidAt $paidAt;

    /**
     * @var CreatedAt
     */
    private CreatedAt $createdAt;

    /**
     * @var UpdatedAt
     */
    private UpdatedAt $updatedAt;

    /**
     * Expenses constructor.
     * @param Uuid $id
     * @param User $user
     * @param Group $group
     * @param Category $category
     * @param Description $description
     * @param Amount $amount
     * @param PaidAt $paidAt
     * @param CreatedAt $createdAt
     * @param UpdatedAt $updatedAt
     */
    public function __construct(
        Uuid $id,
        User $user,
        Group $group,
        Category $category,
        Description $description,
        Amount $amount,
        PaidAt $paidAt,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->id = $id;
        $this->user = $user;
        $this->group = $group;
        $this->description = $description;
        $this->category = $category;
        $this->amount = $amount;
        $this->paidAt = $paidAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param Uuid $id
     * @param User $user
     * @param Group $group
     * @param Category $category
     * @param Description $description
     * @param Amount $amount
     * @param PaidAt $paidAt
     * @return static
     */
    public static function create(
        Uuid $id,
        User $user,
        Group $group,
        Category $category,
        Description $description,
        Amount $amount,
        PaidAt $paidAt
    ): self {
        return new self(
            $id,
            $user,
            $group,
            $category,
            $description,
            $amount,
            $paidAt,
            new CreatedAt(new DateTime()),
            new UpdatedAt(new DateTime())
        );
    }

    /**
     * @param Category $category
     * @param Description $description
     * @param Amount $amount
     * @param PaidAt $paidAt
     */
    public function update(
        Category $category,
        Description $description,
        Amount $amount,
        PaidAt $paidAt
    ) {
        $this->category = $category;
        $this->description = $description;
        $this->amount = $amount;
        $this->paidAt = $paidAt;

        $this->updatedAt = new UpdatedAt(new DateTime());
    }

    /**
     * @return Uuid
     */
    public function id(): Uuid
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * @return Group
     */
    public function Group(): Group
    {
        return $this->group;
    }

    /**
     * @return Category
     */
    public function category(): Category
    {
        return $this->category;
    }

    /**
     * @return Description
     */
    public function description(): Description
    {
        return $this->description;
    }

    /**
     * @return Amount
     */
    public function amount(): Amount
    {
        return $this->amount;
    }

    /**
     * @return PaidAt
     */
    public function paidAt(): PaidAt
    {
        return $this->paidAt;
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
            'user' => $this->user()->toArray(),
            'Group' => $this->group()->toArray(),
            'description' => $this->description()->value(),
            'amount' => $this->amount()->value(),
            'paid_at' => $this->paidAt()->value(),
            'created_at' => $this->createdAt()->value(),
            'updated_at' => $this->updatedAt()->value()
        ];
    }
}
