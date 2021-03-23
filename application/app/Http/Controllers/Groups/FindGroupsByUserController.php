<?php

declare(strict_types=1);

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;
use FinanceDuo\Groups\Application\FindByUser\FindGroupsByUserHandler;
use FinanceDuo\Groups\Application\FindByUser\FindGroupsByUserQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class FindGroupsByUserController
 * @package App\Http\Controllers\Users
 */
class FindGroupsByUserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, $this->rules());

        $this->queryBus->addHandler(FindGroupsByUserQuery::class, FindGroupsByUserHandler::class);

        $response = $this->queryBus->ask(
            new FindGroupsByUserQuery($request->input('user_id'))
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
