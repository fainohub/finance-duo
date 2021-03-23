<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\SearchCategories;

use FinanceDuo\Expenses\Domain\Categories;
use FinanceDuo\Expenses\Domain\CategoryRepository;

/**
 * Class CategoryLister
 * @package FinanceDuo\Expenses\Application\SearchCategory
 */
class CategorySearcher
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * CategoryFinder constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return Categories
     */
    public function __invoke(): Categories
    {
        return $this->categoryRepository->all();
    }
}
