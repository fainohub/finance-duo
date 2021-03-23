<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application;

use FinanceDuo\Expenses\Domain\Expense;
use FinanceDuo\Expenses\Domain\Expenses;
use Shared\Domain\Bus\ResponseInterface;

/**
 * Class ExpensesResponse
 * @package FinanceDuo\Expenses\Application
 */
class ExpensesResponse implements ResponseInterface
{
    /**
     * @var Expenses
     */
    private Expenses $expenses;

    /**
     * ExpensesResponse constructor.
     * @param Expenses $expenses
     */
    public function __construct(Expenses $expenses)
    {
        $this->expenses = $expenses;
    }

    /**
     * @return Expenses
     */
    public function expenses(): Expenses
    {
        return $this->expenses;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $data = [
            'expenses' => []
        ];

        /**
         * @var Expense $expense
         */
        foreach ($this->expenses() as $expense) {
            $data['expenses'][] = [
                'id' => $expense->id()->value(),
                'description' => $expense->description()->value(),
                'amount' => $expense->amount()->value(),
                'paid_at' => $expense->paidAt()->value(),
                'created_at' => $expense->createdAt()->value(),
                'updated_at' => $expense->updatedAt()->value()
            ];
        }

        return $data;
    }
}
