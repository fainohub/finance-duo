<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;
use Shared\Domain\Bus\Command\CommandBus;
use Shared\Domain\Bus\Query\QueryBus;
use Shared\Infrastructure\Bus\DoctrineTransactionMiddleware;
use Shared\Infrastructure\Bus\LumenBusHandlerLocator;
use Shared\Infrastructure\Bus\TacticianCommandBus;
use Shared\Infrastructure\Bus\TacticianQueryBus;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Command Bus
        $this->app->singleton(CommandBus::class, function () {
            $locator = new LumenBusHandlerLocator();

            $commandHandlerMiddleware = new CommandHandlerMiddleware(
                new ClassNameExtractor(),
                $locator,
                new InvokeInflector()
            );

            $doctrineTransactionMiddleware = new DoctrineTransactionMiddleware(
                app('Doctrine\ORM\EntityManagerInterface')
            );

            $chain = [
                $doctrineTransactionMiddleware,
                $commandHandlerMiddleware
            ];

            return new TacticianCommandBus($chain, $locator);
        });

        //Query Bus
        $this->app->singleton(QueryBus::class, function () {
            $locator = new LumenBusHandlerLocator();

            $commandHandlerMiddleware = new CommandHandlerMiddleware(
                new ClassNameExtractor(),
                $locator,
                new InvokeInflector()
            );

            return new TacticianQueryBus([$commandHandlerMiddleware], $locator);
        });
    }
}
