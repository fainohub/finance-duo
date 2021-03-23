<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Update;

use FinanceDuo\Expenses\Domain\Category;
use FinanceDuo\Expenses\Domain\Expense;
use FinanceDuo\Expenses\Domain\ExpenseRepository;
use FinanceDuo\Expenses\Domain\Amount;
use FinanceDuo\Expenses\Domain\PaidAt;
use FinanceDuo\Users\Domain\User;
use InvalidArgumentException;
use Shared\Domain\ValueObject\Description;

/**
 * Class ExpenseCreator
 * @package FinanceDuo\Expenses\Application\Create
 */
class ExpenseUpdater
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
     * @param Category $category
     * @param Description $description
     * @param Amount $amount
     * @param PaidAt $paidAt
     * @return Expense
     */
    public function __invoke(
        User $user,
        Expense $expense,
        Category $category,
        Description $description,
        Amount $amount,
        PaidAt $paidAt
    ): Expense {
        if ($expense->user()->id()->value() != $user->id()->value()) {
            throw new InvalidArgumentException('Não foi possível editar essa despesa');
        }

        $expense->update(
            $category,
            $description,
            $amount,
            $paidAt,
        );

        $this->expenseRepository->save($expense);

        return $expense;
    }
}
