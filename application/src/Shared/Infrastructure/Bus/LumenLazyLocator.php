<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Bus;

use League\Tactician\Exception\MissingHandlerException;

/**
 * Class LumenLazyLocator
 * @package ArtishUp\Shared\Infrastructure\Bus
 */
class LumenLazyLocator extends LumenBusHandlerLocator
{
    /**
     * Bind a handler instance to receive all commands with a certain class
     *
     * @param string $handler          Handler to receive class name
     * @param string $commandClassName Command class e.g. "My\TaskAddedCommand"
     */
    public function addHandler($handler, $commandClassName)
    {
        $this->handlers[$commandClassName] = function () use ($handler) {
            return app($handler);
        };
    }

    /**
     * Retrieves the handler for a specified command
     *
     * @param string $commandName
     *
     * @return object
     *
     * @throws MissingHandlerException
     */
    public function getHandlerForCommand($commandName)
    {
        if (!is_callable($this->handlers[$commandName])) {
            throw MissingHandlerException::forCommand($commandName);
        }

        /** @var callable $handler */
        $handler = $this->handlers[$commandName];

        return $handler();
    }
}
