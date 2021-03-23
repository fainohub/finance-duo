<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Update;

use DateTime;
use Exception;
use FinanceDuo\Expenses\Application\Find\ExpenseFinder;
use FinanceDuo\Expenses\Application\FindCategory\CategoryFinder;
use FinanceDuo\Expenses\Domain\Amount;
use FinanceDuo\Expenses\Domain\NotFoundCategory;
use FinanceDuo\Expenses\Domain\PaidAt;
use FinanceDuo\Users\Application\Find\UserFinder;
use Shared\Domain\Bus\Command\CommandHandler;
use Shared\Domain\ValueObject\Description;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class UpdateExpanseHandler
 * @package FinanceDuo\Expenses\Application\Update
 */
class UpdateExpanseHandler implements CommandHandler
{
    /**
     * @var UserFinder
     */
    private UserFinder $userFinder;

    /**
     * @var CategoryFinder
     */
    private CategoryFinder $categoryFinder;

    /**
     * @var ExpenseFinder
     */
    private ExpenseFinder $expenseFinder;

    /**
     * @var ExpenseUpdater
     */
    private ExpenseUpdater $expenseUpdater;

    /**
     * CreateExpanseHandler constructor.
     * @param UserFinder $userFinder
     * @param CategoryFinder $categoryFinder
     * @param ExpenseFinder $expenseFinder
     * @param ExpenseUpdater $expenseUpdater
     */
    public function __construct(
        UserFinder $userFinder,
        CategoryFinder $categoryFinder,
        ExpenseFinder $expenseFinder,
        ExpenseUpdater $expenseUpdater
    ) {
        $this->userFinder = $userFinder;
        $this->categoryFinder = $categoryFinder;
        $this->expenseFinder = $expenseFinder;
        $this->expenseUpdater = $expenseUpdater;
    }

    /**
     * @param UpdateExpenseCommand $command
     * @return void
     * @throws NotFoundCategory
     * @throws Exception
     */
    public function __invoke(UpdateExpenseCommand $command): void
    {
        $user = ($this->userFinder)(new Uuid($command->userId()));

        $category = ($this->categoryFinder)(new Uuid($command->categoryId()));

        $expense = ($this->expenseFinder)(new Uuid($command->id()));

        ($this->expenseUpdater)(
            $user,
            $expense,
            $category,
            new Description($command->description()),
            new Amount($command->amount()),
            new PaidAt(new DateTime($command->paidAt()))
        );
    }
}
