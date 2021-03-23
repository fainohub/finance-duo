<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use FinanceDuo\Users\Application\Create\CreateUserCommand;
use FinanceDuo\Users\Application\Create\CreateUserHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class CreateUserController
 * @package App\Http\Controllers\Expenses
 */
class CreateUserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, $this->rules());

        $this->commandBus->addHandler(CreateUserCommand::class, CreateUserHandler::class);

        $command = new CreateUserCommand(
            $request->input('id'),
            $request->input('username'),
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        $this->commandBus->dispatch($command);

        //https://github.com/omniti-labs/jsend

        $response = [
            'status' => 'success',
            //'data'   => null
        ];

        return new JsonResponse($response, JsonResponse::HTTP_CREATED);
    }

    /**
     * @return array
     */
    private function rules(): array
    {
        return [
            'id'       => 'required|uuid',
            'username' => 'required',
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }
}
