<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\In\Console;

use App\GofPatterns\AbstractFactory\Application\Port\Out\Factory\ProviderSelectorFactoryInterface;
use App\GofPatterns\AbstractFactory\Domain\ValueObject\ProviderEnum;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:abstract-factory',
    description: 'Create payment based on Abstract Factory',
)]
class AbstractFactoryCommand extends Command
{
    public const string ARGUMENT_PROVIDER = 'provider';
    public const string ARGUMENT_AMOUNT = 'amount';

    public function __construct(private readonly ProviderSelectorFactoryInterface $selector)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument(self::ARGUMENT_PROVIDER, InputArgument::REQUIRED, 'Payment provider');
        $this->addArgument(self::ARGUMENT_AMOUNT, InputArgument::REQUIRED, 'Amount in USD');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $provider = ProviderEnum::from((string) $input->getArgument('provider'));
        $factory = $this->selector->select($provider);

        $paymentId = $factory
            ->createCharge()
            ->charge(
                '1',
                (int) $input->getArgument(self::ARGUMENT_AMOUNT),
                'USD',
            );

        $output->writeln("<info>Notification sent! PaymentId: $paymentId</info>");

        return Command::SUCCESS;
    }
}
