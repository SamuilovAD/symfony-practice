<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Infrastructure\Inventory;

use App\GofPatterns\Facade\Domain\Port\InventoryServiceInterface;

final class InMemoryInventoryService implements InventoryServiceInterface
{
    /** @var array<int,int> */
    private array $stock;

    /**
     * @param array<int,int> $initialStock
     */
    public function __construct(array $initialStock = [1 => 5, 2 => 10, 3 => 0])
    {
        $this->stock = $initialStock;
    }

    public function checkAndReserve(array $items): bool
    {
        // Check availability
        foreach ($items as $productId => $qty) {
            $available = $this->stock[$productId] ?? 0;
            if ($available < $qty) {
                return false;
            }
        }
        // Reserve (decrease)
        foreach ($items as $productId => $qty) {
            $this->stock[$productId] = ($this->stock[$productId] ?? 0) - $qty;
        }

        return true;
    }

    public function release(array $items): void
    {
        foreach ($items as $productId => $qty) {
            $this->stock[$productId] = ($this->stock[$productId] ?? 0) + $qty;
        }
    }
}
