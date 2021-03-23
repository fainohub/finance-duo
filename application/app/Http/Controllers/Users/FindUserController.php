<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use FinanceDuo\Users\Application\Find\FindUserHandler;
use FinanceDuo\Users\Application\Find\FindUserQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class FindUserController
 * @package App\Http\Controllers\Users
 */
class FindUserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, $this->rules());

        $this->queryBus->addHandler(FindUserQuery::class, FindUserHandler::class);

        $response = $this->queryBus->ask(
            new FindUserQuery($request->input('user_id'))
        );

        return new JsonResponse($response, JsonResponse::HTTP_OK);
    }

    /**
     * @return array
     */
    private function rules(): array
    {
        return [
            'user_id' => 'required|uuid'
        ];
    }
}
