<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Domain;

use Shared\Domain\DomainError;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class NotFoundUser
 * @package FinanceDuo\Users\Domain
 */
class NotFoundUser extends DomainError
{
    /**
     * @var Uuid
     */
    private Uuid $id;

    /**
     * NotFoundUser constructor.
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
        return 'user-not-found';
    }

    /**
     * @return string
     */
    protected function errorMessage(): string
    {
        return "Not found user {$this->id->value()}";
    }
}
