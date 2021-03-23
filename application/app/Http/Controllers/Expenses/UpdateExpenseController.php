<?php

declare(strict_types=1);

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use FinanceDuo\Expenses\Application\Update\UpdateExpanseHandler;
use FinanceDuo\Expenses\Application\Update\UpdateExpenseCommand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class UpdateExpenseController
 * @package App\Http\Controllers\Expenses
 */
class UpdateExpenseController extends Controller
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

        $this->commandBus->addHandler(UpdateExpenseCommand::class, UpdateExpanseHandler::class);

        $command = new UpdateExpenseCommand(
            $id,
            $request->input('user_id'),
            $request->input('category_id'),
            $request->input('description'),
            (float) $request->input('amount'),
            $request->input('paid_at')
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
            'user_id'     => 'required|uuid',
            'category_id' => 'required|uuid',
            'description' => 'required',
            'amount'      => 'required|numeric',
            'paid_at'     => 'required|date',
        ];
    }
}
