<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application\Find;

use Shared\Domain\Bus\Query\Query;

/**
 * Class FindUserQuery
 * @package FinanceDuo\Users\Application\Find
 */
class FindUserQuery implements Query
{
    /**
     * @var string
     */
    private string $id;

    /**
     * FindUserQuery constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}
