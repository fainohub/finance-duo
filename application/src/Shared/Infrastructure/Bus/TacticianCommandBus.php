<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Bus;

use Shared\Domain\Bus\Command\Command;
use Shared\Domain\Bus\Command\CommandBus;

/**
 * Class TacticianCommandBus
 * @package Shared\Infrastructure\Bus
 */
final class TacticianCommandBus extends \League\Tactician\CommandBus implements CommandBus
{
    /**
     * @var BusHandlerLocator
     */
    private BusHandlerLocator $locator;

    /**
     * TacticianCommandBus constructor.
     * @param array $middleware
     * @param BusHandlerLocator $locator
     */
    public function __construct(array $middleware, BusHandlerLocator $locator)
    {
        parent::__construct($middleware);

        $this->locator = $locator;
    }

    /**
     * @param Command $command
     * @return void
     */
    public function dispatch(Command $command): void
    {
        $this->handle($command);
    }

    /**
     * @param string $handlerClassName
     * @param string $commandClassName
     * @return mixed|void
     */
    public function addHandler(string $commandClassName, string $handlerClassName)
    {
        $this->locator->addHandler($handlerClassName, $commandClassName);
    }
}
