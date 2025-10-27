<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Infrastructure\Adapter\In;

use App\GofPatterns\Facade\Application\UseCase\PlaceOrder\PlaceOrderFacadeHandler;
use App\GofPatterns\Facade\Application\UseCase\PlaceOrder\PlaceOrderRequest;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:facade',
    description: 'Demonstrate Facade pattern by placing an order through a single unified service',
)]
final class FacadeCommand extends Command
{
    public function __construct(private readonly PlaceOrderFacadeHandler $facade)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>=== Facade: Place Order ===</info>');
        $request = new PlaceOrderRequest(
            userId: 42,
            items: [1 => 2, 2 => 1],
            totalAmountCents: 2999,
            currency: 'USD',
        );

        $result = $this->facade->placeOrder($request);

        if ($result->success) {
            $output->writeln(sprintf('Success! Order ID: %d, TX: %s', $result->orderId, $result->transactionId));
        } else {
            $output->writeln('<error>Failed: '.$result->message.'</error>');
        }

        return Command::SUCCESS;
    }
}
