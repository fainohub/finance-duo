<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Domain;

use Shared\Domain\DomainError;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class NotFoundExpense
 * @package FinanceDuo\Expenses\Domain
 */
class NotFoundExpense extends DomainError
{
    /**
     * @var Uuid
     */
    private Uuid $id;

    /**
     * NotFoundExpense constructor.
     * @param Uuid $id
     */
    public function __construct(Uuid $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    /**
     * @return string
     */
    public function errorCode(): string
    {
        return 'expense-not-found';
    }

    /**
     * @return string
     */
    protected function errorMessage(): string
    {
        return "Not found expense {$this->id->value()}";
    }
}
