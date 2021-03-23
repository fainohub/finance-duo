<?php

declare(strict_types=1);

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use FinanceDuo\Expenses\Application\Delete\DeleteExpanseHandler;
use FinanceDuo\Expenses\Application\Delete\DeleteExpenseCommand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class DeleteExpenseController
 * @package App\Http\Controllers\Expenses
 */
class DeleteExpenseController extends Controller
{
    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request, string $id): JsonResponse
    {
        $this->validate($request, $this->rules());

        $this->commandBus->addHandler(DeleteExpenseCommand::class, DeleteExpanseHandler::class);

        $command = new DeleteExpenseCommand(
            $id,
            $request->input('user_id')
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
            'user_id' => 'required|uuid',
        ];
    }
}
