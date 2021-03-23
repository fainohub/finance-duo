<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Domain;

use Shared\Domain\ValueObject\Uuid;

/**
 * Interface CategoryRepository
 * @package FinanceDuo\Expenses\Domain
 */
interface CategoryRepository
{
    /**
     * @param Uuid $id
     * @return Category|null
     */
    public function findById(Uuid $id): ?Category;

    /**
     * @return Categories
     */
    public function all(): Categories;
}
