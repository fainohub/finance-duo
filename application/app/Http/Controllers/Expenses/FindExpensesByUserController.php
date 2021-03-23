<?php

declare(strict_types=1);

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use FinanceDuo\Expenses\Application\FindByUser\FindExpensesByUserHandler;
use FinanceDuo\Expenses\Application\FindByUser\FindExpensesByUserQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FindExpensesByUserController
 * @package App\Http\Controllers\Expenses
 */
class FindExpensesByUserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->queryBus->addHandler(FindExpensesByUserQuery::class, FindExpensesByUserHandler::class);

        $response = $this->queryBus->ask(
            new FindExpensesByUserQuery($request->input('user_id'))
        );

        return new JsonResponse($response, JsonResponse::HTTP_OK);
    }
}
