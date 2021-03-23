<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\FindByUser;

use FinanceDuo\Expenses\Domain\ExpenseRepository;
use FinanceDuo\Expenses\Domain\Expenses;
use FinanceDuo\Users\Domain\User;

/**
 * Class ExpensesByUserFinder
 * @package FinanceDuo\Expenses\Application\FindByUser
 */
class ExpensesByUserFinder
{
    /**
     * @var ExpenseRepository
     */
    private ExpenseRepository $expenseRepository;

    /**
     * ExpensesByUserFinder constructor.
     * @param ExpenseRepository $expenseRepository
     */
    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * @param User $user
     * @return Expenses
     */
    public function __invoke(User $user): Expenses
    {
        return $this->expenseRepository->findByUser($user);
    }
}
