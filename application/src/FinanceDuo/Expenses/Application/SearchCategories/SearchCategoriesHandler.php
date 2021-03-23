<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\SearchCategories;

/**
 * Class SearchCategoriesHandler
 * @package FinanceDuo\Expenses\Application\SearchCategory
 */
class SearchCategoriesHandler
{
    /**
     * @var CategorySearcher
     */
    private CategorySearcher $categorySearcher;

    /**
     * SearchCategoriesHandler constructor.
     * @param CategorySearcher $categorySearcher
     */
    public function __construct(CategorySearcher $categorySearcher)
    {
        $this->categorySearcher = $categorySearcher;
    }

    /**
     * @param SearchCategoriesQuery $query
     * @return SearchCategoriesResponse
     */
    public function __invoke(SearchCategoriesQuery $query): SearchCategoriesResponse
    {
        $categories = ($this->categorySearcher)();

        return new SearchCategoriesResponse($categories);
    }
}
