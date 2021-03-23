<?php

declare(strict_types=1);

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use FinanceDuo\Expenses\Application\Create\CreateExpanseHandler;
use FinanceDuo\Expenses\Application\Create\CreateExpenseCommand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class CreateExpenseController
 * @package App\Http\Controllers\Expenses
 */
class CreateExpenseController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, $this->rules());

        $this->commandBus->addHandler(CreateExpenseCommand::class, CreateExpanseHandler::class);

        $command = new CreateExpenseCommand(
            $request->input('id'),
            $request->input('user_id'),
            $request->input('group_id'),
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
            'id'          => 'required|uuid',
            'user_id'     => 'required|uuid',
            'group_id'    => 'required|uuid',
            'category_id' => 'required|uuid',
            'description' => 'required',
            'amount'      => 'required|numeric',
            'paid_at'     => 'required|date',
        ];
    }
}
