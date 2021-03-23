<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application;

use FinanceDuo\Expenses\Domain\Expense;
use Shared\Domain\Bus\ResponseInterface;

/**
 * Class ExpenseResponse
 * @package FinanceDuo\Expenses\Application
 */
class ExpenseResponse implements ResponseInterface
{
    /**
     * @var Expense
     */
    private Expense $expense;

    /**
     * ExpenseResponse constructor.
     * @param Expense $expense
     */
    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    /**
     * @return Expense
     */
    public function expense(): Expense
    {
        return $this->expense;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->expense()->toArray();
    }
}
