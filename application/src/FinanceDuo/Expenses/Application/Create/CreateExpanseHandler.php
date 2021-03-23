<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\Create;

use DateTime;
use Exception;
use FinanceDuo\Groups\Application\Find\GroupFinder;
use FinanceDuo\Groups\Domain\NotFoundGroup;
use FinanceDuo\Expenses\Application\FindCategory\CategoryFinder;
use FinanceDuo\Expenses\Domain\Amount;
use FinanceDuo\Expenses\Domain\NotFoundCategory;
use FinanceDuo\Expenses\Domain\PaidAt;
use FinanceDuo\Users\Application\Find\UserFinder;
use FinanceDuo\Users\Domain\NotFoundUser;
use Shared\Domain\Bus\Command\CommandHandler;
use Shared\Domain\ValueObject\Description;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class CreateExpanseHandler
 * @package FinanceDuo\Expenses\Application\Create
 */
class CreateExpanseHandler implements CommandHandler
{
    /**
     * @var UserFinder
     */
    private UserFinder $userFinder;

    /**
     * @var GroupFinder
     */
    private GroupFinder $groupFinder;

    /**
     * @var CategoryFinder
     */
    private CategoryFinder $categoryFinder;

    /**
     * @var ExpenseCreator
     */
    private ExpenseCreator $expenseCreator;

    /**
     * CreateExpanseHandler constructor.
     * @param UserFinder $userFinder
     * @param GroupFinder $groupFinder
     * @param CategoryFinder $categoryFinder
     * @param ExpenseCreator $expenseCreator
     */
    public function __construct(
        UserFinder $userFinder,
        GroupFinder $groupFinder,
        CategoryFinder $categoryFinder,
        ExpenseCreator $expenseCreator
    ) {
        $this->userFinder = $userFinder;
        $this->groupFinder = $groupFinder;
        $this->categoryFinder = $categoryFinder;
        $this->expenseCreator = $expenseCreator;
    }

    /**
     * @param CreateExpenseCommand $command
     * @return void
     * @throws NotFoundCategory
     * @throws NotFoundUser
     * @throws NotFoundGroup
     * @throws Exception
     */
    public function __invoke(CreateExpenseCommand $command): void
    {
        $user = ($this->userFinder)(new Uuid($command->userId()));

        $group = ($this->groupFinder)(new Uuid($command->groupId()));

        $category = ($this->categoryFinder)(new Uuid($command->categoryId()));

        ($this->expenseCreator)(
            new Uuid($command->id()),
            $user,
            $group,
            $category,
            new Description($command->description()),
            new Amount($command->amount()),
            new PaidAt(new DateTime($command->paidAt()))
        );
    }
}
