<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\FindCategory;

use FinanceDuo\Expenses\Domain\Category;
use FinanceDuo\Expenses\Domain\CategoryRepository;
use FinanceDuo\Expenses\Domain\NotFoundCategory;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class CategoryFinder
 * @package FinanceDuo\Expenses\Application\FindCategory
 */
class CategoryFinder
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
     * @param Uuid $id
     * @return Category
     * @throws NotFoundCategory
     */
    public function __invoke(Uuid $id): Category
    {
        $category = $this->categoryRepository->findById($id);

        if ($category === null) {
            throw new NotFoundCategory($id);
        }

        return $category;
    }
}
