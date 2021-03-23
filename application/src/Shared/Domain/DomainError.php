<?php

declare(strict_types=1);

namespace Shared\Domain;

use Exception;

/**
 * Class DomainError
 * @package Shared\Domain
 */
abstract class DomainError extends Exception
{
    /**
     * DomainError constructor.
     */
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    /**
     * @return string
     */
    abstract public function errorCode(): string;

    /**
     * @return string
     */
    abstract protected function errorMessage(): string;
}
