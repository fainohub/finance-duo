<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use FinanceDuo\Auth\Application\Login\LoginHandler;
use FinanceDuo\Auth\Application\Login\LoginQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, $this->rules());

        $this->queryBus->addHandler(LoginQuery::class, LoginHandler::class);

        $query = new LoginQuery(
            $request->input('email'),
            $request->input('password')
        );

        $response = $this->queryBus->ask($query);

        return new JsonResponse($response, JsonResponse::HTTP_CREATED);
    }

    /**
     * @return array
     */
    private function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }
}
