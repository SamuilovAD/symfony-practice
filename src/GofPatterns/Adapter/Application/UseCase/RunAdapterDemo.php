<?php

declare(strict_types=1);

namespace App\GofPatterns\Adapter\Application\UseCase;

use Psr\Log\LoggerInterface;

final readonly class RunAdapterDemo
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function execute(): void
    {
        $this->logger->info('Adapter demo started');
        $this->logger->info('Performing some operation...');
        $this->logger->info('Adapter demo finished successfully');
    }
}
