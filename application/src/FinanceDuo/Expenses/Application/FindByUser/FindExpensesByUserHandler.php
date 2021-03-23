<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\FindByUser;

use FinanceDuo\Expenses\Application\ExpensesResponse;
use FinanceDuo\Users\Application\Find\UserFinder;
use FinanceDuo\Users\Domain\NotFoundUser;
use Shared\Domain\Bus\Query\QueryHandler;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class FindExpensesByUserHandler
 * @package FinanceDuo\Expenses\Application\FindByUser
 */
class FindExpensesByUserHandler implements QueryHandler
{
    /**
     * @var UserFinder
     */
    private UserFinder $userFinder;

    /**
     * @var ExpensesByUserFinder
     */
    private ExpensesByUserFinder $expenseSearcher;

    /**
     * FindExpensesByUserHandler constructor.
     * @param UserFinder $userFinder
     * @param ExpensesByUserFinder $expenseSearcher
     */
    public function __construct(UserFinder $userFinder, ExpensesByUserFinder $expenseSearcher)
    {
        $this->userFinder = $userFinder;
        $this->expenseSearcher = $expenseSearcher;
    }

    /**
     * @param FindExpensesByUserQuery $query
     * @return ExpensesResponse
     * @throws NotFoundUser
     */
    public function __invoke(FindExpensesByUserQuery $query): ExpensesResponse
    {
        $user = ($this->userFinder)(new Uuid($query->userId()));

        $expenses = ($this->expenseSearcher)($user);

        return new ExpensesResponse($expenses);
    }
}
