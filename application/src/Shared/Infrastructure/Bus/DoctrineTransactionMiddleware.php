<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Bus;

use Doctrine\ORM\EntityManagerInterface;
use League\Tactician\Middleware;

/**
 * Class DoctrineTransactionMiddleware
 * @package PicPay\Shared\Infrastructure\Bus\Command\Middleware
 */
class DoctrineTransactionMiddleware implements Middleware
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * DoctrineTransactionMiddleware constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param object $command
     * @param callable $next
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $this->entityManager->flush();

        return $returnValue;
    }
}
