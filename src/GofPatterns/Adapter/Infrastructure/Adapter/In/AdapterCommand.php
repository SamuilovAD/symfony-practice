<?php

declare(strict_types=1);

namespace App\GofPatterns\Adapter\Infrastructure\Adapter\In;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:adapter',
    description: 'Demonstrate Adapter pattern with a file logger',
)]
final class AdapterCommand extends Command
{
    public function __construct(private readonly LoggerInterface $logger)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Writing logs via adapter...');
        $this->logger->log(LogLevel::INFO, 'Adapter test started');
        $this->logger->log(LogLevel::INFO, 'Performing some operation...');
        $this->logger->log(LogLevel::INFO, 'Adapter test finished successfully');
        $output->writeln('<info>Check var/logs/adapter.log — log has been written.</info>');

        return Command::SUCCESS;
    }
}
