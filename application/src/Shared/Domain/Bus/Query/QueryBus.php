<?php

declare(strict_types=1);

namespace Shared\Domain\Bus\Query;

use Shared\Domain\Bus\ResponseInterface;

/**
 * Interface QueryBus
 * @package Shared\Domain\Bus\Query
 */
interface QueryBus
{
    /**
     * @param Query $query
     * @return ResponseInterface|null
     */
    public function ask(Query $query): ?ResponseInterface;

    /**
     * @param string $queryClassName
     * @param string $handlerClassName
     * @return mixed
     */
    public function addHandler(string $queryClassName, string $handlerClassName);
}
