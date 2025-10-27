<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Domain\Port;

interface OrderRepositoryInterface
{
    /**
     * @param array<int,int> $items
     */
    public function save(
        int $userId,
        array $items,
        int $totalAmountCents,
        string $currency,
        string $transactionId
    ): int;
}
