<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Find;

use FinanceDuo\Expenses\Domain\Expense;
use FinanceDuo\Expenses\Domain\ExpenseRepository;
use FinanceDuo\Expenses\Domain\NotFoundExpense;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class ExpenseFinder
 * @package FinanceDuo\Expenses\Application\Find
 */
class ExpenseFinder
{
    /**
     * @var ExpenseRepository
     */
    private ExpenseRepository $repository;

    /**
     * ExpenseFinder constructor.
     * @param ExpenseRepository $repository
     */
    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Uuid $id
     * @return Expense
     * @throws NotFoundExpense
     */
    public function __invoke(Uuid $id): Expense
    {
        $expense = $this->repository->findById($id);

        if ($expense === null) {
            throw new NotFoundExpense($id);
        }

        return $expense;
    }
}
