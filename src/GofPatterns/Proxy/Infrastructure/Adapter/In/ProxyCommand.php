<?php

declare(strict_types=1);

namespace App\GofPatterns\Proxy\Infrastructure\Adapter\In;

use App\GofPatterns\Proxy\Domain\Port\ProductView;
use App\GofPatterns\Proxy\Infrastructure\Factory\ProductGhostFactory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'gof:proxy',
    description: 'Demonstrate Proxy (ghost) lazy-loading pattern',
)]
final class ProxyCommand extends Command
{
    public function __construct(private readonly ProductGhostFactory $factory)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('ids', InputArgument::IS_ARRAY | InputArgument::OPTIONAL, 'Product IDs', []);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string[] $idsArg */
        $idsArg = $input->getArgument('ids');
        $ids = array_map('intval', $idsArg ?: [1, 2, 1, 3, 2]);

        $output->writeln('Fetching products via ghosts (Proxy)...');

        /** @var array<int,ProductView> $ghosts */
        $ghosts = [];
        foreach ($ids as $id) {
            // Create a ghost for each requested id
            $ghosts[] = $this->factory->create($id);
        }

        foreach ($ghosts as $ghost) {
            // Access id without hydration
            $output->writeln('ID (no hydrate): '.$ghost->getId());
            // First field access triggers hydration (once per unique id, thanks to catalog cache)
            $output->writeln('Name (hydrate): '.$ghost->getName());
            // Subsequent fields use the already-hydrated real object
            $output->writeln(sprintf('Price (cached): %0.2f₪', $ghost->getPriceCents() / 100));
            $output->writeln('');
        }

        return Command::SUCCESS;
    }
}
