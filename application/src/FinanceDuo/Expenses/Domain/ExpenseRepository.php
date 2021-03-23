<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Domain;

use FinanceDuo\Users\Domain\User;
use Shared\Domain\ValueObject\Uuid;

/**
 * Interface ExpenseRepository
 * @package FinanceDuo\Expenses\Domain
 */
interface ExpenseRepository
{
    /**
     * @param Uuid $id
     * @return Expense|null
     */
    public function findById(Uuid $id): ?Expense;

    /**
     * @param User $user
     * @return Expenses
     */
    public function findByUser(User $user): Expenses;

    /**
     * @param Expense $expense
     */
    public function save(Expense $expense): void;

    /**
     * @param Expense $expense
     */
    public function delete(Expense $expense): void;
}
