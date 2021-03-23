<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Infrastructure\Persistence;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;
use FinanceDuo\Expenses\Domain\Expense;
use FinanceDuo\Expenses\Domain\ExpenseRepository;
use FinanceDuo\Expenses\Domain\Expenses;
use FinanceDuo\Users\Domain\User;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class ExpenseDoctrineRepository
 * @package FinanceDuo\Expenses\Infrastructure\Doctrine
 */
class ExpenseDoctrineRepository extends EntityRepository implements ExpenseRepository
{
    /**
     * @param Uuid $id
     * @return Expense|null
     */
    public function findById(Uuid $id): ?Expense
    {
        $expense = $this->findOneBy(['id' => $id->value()]);

        if ($expense instanceof Expense) {
            return $expense;
        }

        return null;
    }

    /**
     * @param User $user
     * @return Expenses
     */
    public function findByUser(User $user): Expenses
    {
        $expenses = $this->findBy([
            'user' => $user->id()->value()
        ]);

        return new Expenses($expenses);
    }

    /**
     * @param Expense $expense
     * @throws ORMException
     */
    public function save(Expense $expense): void
    {
        $this->getEntityManager()->persist($expense);
    }

    /**
     * @param Expense $expense
     * @throws ORMException
     */
    public function delete(Expense $expense): void
    {
        $this->getEntityManager()->remove($expense);
    }
}
