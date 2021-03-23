<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Bus;

use League\Tactician\CommandBus;
use Shared\Domain\Bus\Query\Query;
use Shared\Domain\Bus\Query\QueryBus;
use Shared\Domain\Bus\ResponseInterface;

/**
 * Class TacticianQueryBus
 * @package Shared\Infrastructure\Bus
 */
final class TacticianQueryBus extends CommandBus implements QueryBus
{
    /**
     * @var BusHandlerLocator
     */
    private BusHandlerLocator $locator;

    /**
     * TacticianQueryBus constructor.
     * @param array $middleware
     * @param BusHandlerLocator $locator
     */
    public function __construct(array $middleware, BusHandlerLocator $locator)
    {
        parent::__construct($middleware);

        $this->locator = $locator;
    }

    /**
     * @param Query $query
     * @return ResponseInterface|null
     */
    public function ask(Query $query): ?ResponseInterface
    {
        return $this->handle($query);
    }

    /**
     * @param string $queryClassName
     * @param string $handlerClassName
     * @return mixed|void
     */
    public function addHandler(string $queryClassName, string $handlerClassName)
    {
        $this->locator->addHandler($handlerClassName, $queryClassName);
    }
}
