<?php

declare(strict_types=1);

namespace App\GofPatterns\Application\Console;

use App\GofPatterns\Domain\Prototype\NotificationPrototype;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:prototype',
    description: 'Test Prototype pattern (object cloning)',
)]
final class PrototypeCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $original = new NotificationPrototype(
            title: 'System Alert',
            message: 'CPU usage is too high!',
            channel: 'sms'
        );
        $copy = clone $original;
        $copy->message = 'Memory usage is too high!';
        $output->writeln('<info>=== Prototype Test ===</info>');
        $output->writeln('Original: '.$original->display());
        $output->writeln('Copy:     '.$copy->display());

        return Command::SUCCESS;
    }
}
