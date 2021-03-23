<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\FindByUser;

use Shared\Domain\Bus\Query\Query;

/**
 * Class FindExpensesByUserQuery
 * @package FinanceDuo\Expenses\Application\FindByUser
 */
class FindExpensesByUserQuery implements Query
{
    /**
     * @var string
     */
    private string $userId;

    /**
     * FindExpensesByUserQuery constructor.
     * @param string $userId
     */
    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function userId(): string
    {
        return $this->userId;
    }
}
