<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Delete;

use FinanceDuo\Expenses\Domain\Expense;
use FinanceDuo\Expenses\Domain\ExpenseRepository;
use FinanceDuo\Users\Domain\User;
use InvalidArgumentException;

/**
 * Class ExpenseDeleter
 * @package FinanceDuo\Expenses\Application\Delete
 */
class ExpenseDeleter
{
    /**
     * @var ExpenseRepository
     */
    private ExpenseRepository $expenseRepository;

    /**
     * ExpenseCreator constructor.
     * @param ExpenseRepository $expenseRepository
     */
    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * @param User $user
     * @param Expense $expense
     */
    public function __invoke(User $user, Expense $expense): void
    {
        if ($expense->user()->id()->value() != $user->id()->value()) {
            throw new InvalidArgumentException('Não foi possível editar essa despesa');
        }

        $this->expenseRepository->delete($expense);
    }
}
