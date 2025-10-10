<?php

declare(strict_types=1);

namespace App\GofPatterns\Application\Console;

use App\GofPatterns\Domain\FactoryMethod\NotifierFactoryInterface;
use App\GofPatterns\Domain\FactoryMethod\NotifierTypeEnum;
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
        private readonly NotifierFactoryInterface $factory,
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
        $message = $input->getArgument(self::ARGUMENT_MESSAGE);
        $type = $input->getArgument(self::ARGUMENT_TYPE);
        $typeEnum = NotifierTypeEnum::from($type);
        $notifier = $this->factory->create($typeEnum);
        $notifier->send($message);
        $output->writeln('<info>Notification sent!</info>');

        return Command::SUCCESS;
    }
}
