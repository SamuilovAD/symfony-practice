<?php

declare(strict_types=1);

namespace App\GofPatterns\Decorator\Application\UseCase;

use App\GofPatterns\Decorator\Domain\Model\Product;
use App\GofPatterns\Decorator\Domain\Port\ProductRepository;

final readonly class GetProductsByIds
{
    public function __construct(private ProductRepository $repo)
    {
    }

    /**
     * @param int[] $ids
     *
     * @return array<int,Product>
     */
    public function execute(array $ids): array
    {
        return $this->repo->findByIds($ids);
    }
}
