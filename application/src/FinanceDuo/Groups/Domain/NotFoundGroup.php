<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Domain;

use Shared\Domain\DomainError;
use Shared\Domain\ValueObject\Uuid;

/**
 * Class NotFoundGroup
 * @package FinanceDuo\Groups\Domain
 */
class NotFoundGroup extends DomainError
{
    /**
     * @var Uuid
     */
    private Uuid $id;

    /**
     * NotFoundGroup constructor.
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
        return 'group-not-found';
    }

    /**
     * @return string
     */
    protected function errorMessage(): string
    {
        return "Not found Group {$this->id->value()}";
    }
}
