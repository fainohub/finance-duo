<?php

declare(strict_types=1);

namespace FinanceDuo\Expenses\Domain;

use Shared\Domain\DomainError;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class NotFoundCategory
 * @package FinanceDuo\Expenses\Domain
 */
class NotFoundCategory extends DomainError
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
        return 'expense-category-not-found';
    }

    /**
     * @return string
     */
    protected function errorMessage(): string
    {
        return "Not found expense category {$this->id->value()}";
    }
}
