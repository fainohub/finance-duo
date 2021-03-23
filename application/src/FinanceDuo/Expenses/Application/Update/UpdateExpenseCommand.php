<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Update;

use Shared\Domain\Bus\Command\Command;

/**
 * Class UpdateExpenseCommand
 * @package FinanceDuo\Expenses\Application\Update
 */
class UpdateExpenseCommand implements Command
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var string
     */
    private string $userId;

    /**
     * @var string
     */
    private string $categoryId;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var float
     */
    private float $amount;

    /**
     * @var string
     */
    private string $paidAt;

    /**
     * CreateExpenseCommand constructor.
     * @param string $id
     * @param string $userId
     * @param string $categoryId
     * @param string $description
     * @param float $amount
     * @param string $paidAt
     */
    public function __construct(
        string $id,
        string $userId,
        string $categoryId,
        string $description,
        float $amount,
        string $paidAt
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->categoryId = $categoryId;
        $this->description = $description;
        $this->amount = $amount;
        $this->paidAt = $paidAt;
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
    public function userId(): string
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function categoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function amount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function paidAt(): string
    {
        return $this->paidAt;
    }
}
