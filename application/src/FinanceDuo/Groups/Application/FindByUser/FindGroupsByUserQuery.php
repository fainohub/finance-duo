<?php

declare(strict_types=1);

namespace FinanceDuo\Groups\Application\FindByUser;

use Shared\Domain\Bus\Query\Query;

/**
 * Class FindGroupsByUserQuery
 * @package FinanceDuo\Users\Application\FindGroups
 */
class FindGroupsByUserQuery implements Query
{
    /**
     * @var string
     */
    private string $userId;

    /**
     * FindGroupsByUserQuery constructor.
     * @param string $userId
     */
    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function userId(): string
    {
        return $this->userId;
    }
}
