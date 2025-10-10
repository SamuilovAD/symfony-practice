<?php

declare(strict_types=1);

namespace App\GofPatterns\Application\Console;

use App\GofPatterns\Infrastructure\Singleton\AppConfig;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:singleton',
    description: 'Display current AppConfig values (for testing the Singleton)',
)]
final class SingletonCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = AppConfig::getInstance();

        $output->writeln('<info>=== AppConfig Debug Info ===</info>');
        $output->writeln(sprintf('Environment: %s', $config->getEnvironment()));
        $output->writeln(sprintf('Version:     %s', $config->getVersion()));
        $output->writeln(sprintf('Debug mode:  %s', $config->isDebug() ? 'ON' : 'OFF'));

        return Command::SUCCESS;
    }
}
