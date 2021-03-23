<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Infrastructure\Persistence;

use Doctrine\ORM\EntityRepository;
use FinanceDuo\Expenses\Domain\Categories;
use FinanceDuo\Expenses\Domain\Category;
use FinanceDuo\Expenses\Domain\CategoryRepository;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class CategoryDoctrineRepository
 * @package FinanceDuo\Expenses\Infrastructure\Persistence
 */
class CategoryDoctrineRepository extends EntityRepository implements CategoryRepository
{
    /**
     * @param Uuid $id
     * @return Category|null
     */
    public function findById(Uuid $id): ?Category
    {
        $category = $this->findOneBy(['id' => $id->value()]);

        if ($category instanceof Category) {
            return $category;
        }

        return null;
    }

    /**
     * @return Categories
     */
    public function all(): Categories
    {
        return new Categories($this->findAll());
    }
}
