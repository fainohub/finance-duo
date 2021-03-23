<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Delete;

use FinanceDuo\Expenses\Application\Find\ExpenseFinder;
use FinanceDuo\Expenses\Domain\NotFoundExpense;
use FinanceDuo\Users\Application\Find\UserFinder;
use FinanceDuo\Users\Domain\NotFoundUser;
use Shared\Domain\Bus\Command\CommandHandler;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class DeleteExpanseHandler
 * @package FinanceDuo\Expenses\Application\Delete
 */
class DeleteExpanseHandler implements CommandHandler
{
    /**
     * @var UserFinder
     */
    private UserFinder $userFinder;

    /**
     * @var ExpenseFinder
     */
    private ExpenseFinder $expenseFinder;

    /**
     * @var ExpenseDeleter
     */
    private ExpenseDeleter $expenseDeleter;

    /**
     * CreateExpanseHandler constructor.
     * @param UserFinder $userFinder
     * @param ExpenseFinder $expenseFinder
     * @param ExpenseDeleter $expenseDeleter
     */
    public function __construct(
        UserFinder $userFinder,
        ExpenseFinder $expenseFinder,
        ExpenseDeleter $expenseDeleter
    ) {
        $this->userFinder = $userFinder;
        $this->expenseFinder = $expenseFinder;
        $this->expenseDeleter = $expenseDeleter;
    }

    /**
     * @param DeleteExpenseCommand $command
     * @throws NotFoundExpense
     * @throws NotFoundUser
     */
    public function __invoke(DeleteExpenseCommand $command): void
    {
        $user = ($this->userFinder)(new Uuid($command->userId()));

        $expense = ($this->expenseFinder)(new Uuid($command->id()));

        ($this->expenseDeleter)($user, $expense);
    }
}
