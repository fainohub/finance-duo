<?php

declare(strict_types=1);

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use FinanceDuo\Expenses\Application\SearchCategories\SearchCategoriesHandler;
use FinanceDuo\Expenses\Application\SearchCategories\SearchCategoriesQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class SearchCategoriesController
 * @package App\Http\Controllers\Expenses
 */
class SearchCategoriesController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->queryBus->addHandler(SearchCategoriesQuery::class, SearchCategoriesHandler::class);

        $response = $this->queryBus->ask(new SearchCategoriesQuery());

        return new JsonResponse($response, JsonResponse::HTTP_OK);
    }
}
