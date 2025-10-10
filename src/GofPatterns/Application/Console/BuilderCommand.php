<?php

declare(strict_types=1);

namespace App\GofPatterns\Application\Console;

use App\GofPatterns\Domain\Builder\StripeUrlBuilderFactoryInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:builder',
    description: 'Generate Stripe Checkout or Portal URL',
)]
final class BuilderCommand extends Command
{
    public function __construct(
        private readonly StripeUrlBuilderFactoryInterface $factory,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('type', InputArgument::REQUIRED, 'checkout|portal')
            ->addArgument('mode', InputArgument::OPTIONAL, 'payment|subscription', 'payment');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $builder = $this->factory->create();
        $url = match ($input->getArgument('type')) {
            'checkout' => $builder
                ->forCheckout()
                ->withMode($input->getArgument('mode'))
                ->withSuccessUrl('https://myapp.com/success')
                ->withCancelUrl('https://myapp.com/cancel')
                ->withCustomerId('cus_123')
                ->build(),
            'portal' => $builder
                ->forCustomerPortal()
                ->withSessionId('sess_789')
                ->withCustomerId('cus_123')
                ->build(),
            default => throw new \InvalidArgumentException('Type must be "checkout" or "portal"'),
        };

        $output->writeln("Generated URL:\n<info>$url</info>");

        return Command::SUCCESS;
    }
}
