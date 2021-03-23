<?php

declare(strict_types=1);

namespace Shared\Domain\Bus\Command;

/**
 * Interface CommandBus
 * @package Shared\Domain\Bus\Command
 */
interface CommandBus
{
    /**
     * @param Command $command
     */
    public function dispatch(Command $command): void;

    /**
     * @param string $commandClassName
     * @param string $handlerClassName
     * @return mixed
     */
    public function addHandler(string $commandClassName, string $handlerClassName);
}
