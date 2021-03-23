<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Delete;

use Shared\Domain\Bus\Command\Command;

/**
 * Class DeleteExpenseCommand
 * @package FinanceDuo\Expenses\Application\Delete
 */
class DeleteExpenseCommand implements Command
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
     * DeleteExpenseCommand constructor.
     * @param string $id
     * @param string $userId
     */
    public function __construct(string $id, string $userId)
    {
        $this->id = $id;
        $this->userId = $userId;
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
}
