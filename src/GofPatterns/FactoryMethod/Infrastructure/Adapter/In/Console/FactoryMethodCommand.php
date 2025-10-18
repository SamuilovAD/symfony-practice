<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Infrastructure\Adapter\In\Console;

use App\GofPatterns\FactoryMethod\Application\UseCase\SendNotificationHandlerInterface;
use App\GofPatterns\FactoryMethod\Application\UseCase\SendNotificationInput;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:factory-method',
    description: 'Send a notification based on Factory Method',
)]
class FactoryMethodCommand extends Command
{
    public const string ARGUMENT_TYPE = 'type';
    public const string ARGUMENT_MESSAGE = 'message';

    public function __construct(
        private readonly SendNotificationHandlerInterface $handler,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument(self::ARGUMENT_TYPE, InputArgument::REQUIRED, 'Type to send');
        $this->addArgument(self::ARGUMENT_MESSAGE, InputArgument::REQUIRED, 'Message to send');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        ($this->handler)(new SendNotificationInput(
            (string) $input->getArgument(self::ARGUMENT_TYPE),
            (string) $input->getArgument(self::ARGUMENT_MESSAGE),
        ));
        $output->writeln('<info>Notification sent!</info>');

        return Command::SUCCESS;
    }
}
