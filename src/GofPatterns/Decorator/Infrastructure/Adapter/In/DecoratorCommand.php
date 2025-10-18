<?php

declare(strict_types=1);

namespace App\GofPatterns\Decorator\Infrastructure\Adapter\In;

use App\GofPatterns\Decorator\Application\UseCase\GetProductsByIds;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:decorator',
    description: 'Demonstrate Decorator pattern with in-memory cache',
)]
final class DecoratorCommand extends Command
{
    public function __construct(private readonly GetProductsByIds $useCase)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Fetching products (Decorator with cache)...');
        $products = $this->useCase->execute([1, 2]);
        foreach ($products as $product) {
            $output->writeln(sprintf(
                '#%d: %s — %0.2f₪',
                $product->id,
                $product->name,
                $product->priceCents / 100
            ));
        }
        $output->writeln('<info>Run again — results come from cache (5 min TTL).</info>');

        return Command::SUCCESS;
    }
}
