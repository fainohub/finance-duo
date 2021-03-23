<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Application\SearchCategories;

use FinanceDuo\Expenses\Domain\Categories;
use Shared\Domain\Bus\ResponseInterface;

/**
 * Class ListCategoriesResponse
 * @package FinanceDuo\Expenses\Application\SearchCategory
 */
class SearchCategoriesResponse implements ResponseInterface
{
    /**
     * @var Categories
     */
    private Categories $categories;

    /**
     * ListCategoriesResponse constructor.
     * @param Categories $categories
     */
    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return Categories
     */
    public function categories(): Categories
    {
        return $this->categories;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $data = [
            'categories' => []
        ];

        foreach ($this->categories as $category) {
            $data['categories'][] = $category->toArray();
        }

        return $data;
    }
}
