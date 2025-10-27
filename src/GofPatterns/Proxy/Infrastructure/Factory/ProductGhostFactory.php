<?php

declare(strict_types=1);

namespace App\GofPatterns\Proxy\Infrastructure\Factory;

use App\GofPatterns\Proxy\Domain\Model\Product;
use App\GofPatterns\Proxy\Domain\Port\ProductCatalogInterface;
use App\GofPatterns\Proxy\Domain\Port\ProductView;

final readonly class ProductGhostFactory
{
    public function __construct(private ProductCatalogInterface $catalog)
    {
    }

    public function create(int $id): ProductView
    {
        return new ProductGhost($id, $this->catalog);
    }
}

final class ProductGhost implements ProductView
{
    private ?Product $real = null;

    public function __construct(
        private readonly int $id,
        private readonly ProductCatalogInterface $catalog,
    ) {
    }

    public function getId(): int
    {
        // Can return id without hydration
        return $this->id;
    }

    public function getName(): string
    {
        return $this->real()->name;
    }

    public function getPriceCents(): int
    {
        return $this->real()->priceCents;
    }

    private function real(): Product
    {
        if (null === $this->real) {
            $this->real = $this->catalog->hydrate($this->id);
        }

        return $this->real;
    }
}
