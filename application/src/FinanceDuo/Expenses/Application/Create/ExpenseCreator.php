<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Create;

use FinanceDuo\Groups\Domain\Group;
use FinanceDuo\Expenses\Domain\Category;
use FinanceDuo\Expenses\Domain\Expense;
use FinanceDuo\Expenses\Domain\ExpenseRepository;
use FinanceDuo\Expenses\Domain\Amount;
use FinanceDuo\Expenses\Domain\PaidAt;
use FinanceDuo\Users\Domain\User;
use Shared\Domain\ValueObject\Description;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class ExpenseCreator
 * @package FinanceDuo\Expenses\Application\Create
 */
class ExpenseCreator
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
     * @param Uuid $id
     * @param User $user
     * @param Group $group
     * @param Category $category
     * @param Description $description
     * @param Amount $amount
     * @param PaidAt $paidAt
     * @return Expense
     */
    public function __invoke(
        Uuid $id,
        User $user,
        Group $group,
        Category $category,
        Description $description,
        Amount $amount,
        PaidAt $paidAt
    ): Expense {
        $expense = Expense::create(
            $id,
            $user,
            $group,
            $category,
            $description,
            $amount,
            $paidAt,
        );

        $this->expenseRepository->save($expense);

        return $expense;
    }
}
