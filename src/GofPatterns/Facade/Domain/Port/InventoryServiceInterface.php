<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Domain\Port;

interface InventoryServiceInterface
{
    /** @param array<int,int> $items */
    public function checkAndReserve(array $items): bool;

    /** @param array<int,int> $items */
    public function release(array $items): void;
}
