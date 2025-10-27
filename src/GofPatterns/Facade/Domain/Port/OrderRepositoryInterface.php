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
        string $transactionId,
    ): int;

    /**
     * @return array<int, array{
     *      userId: int,
     *      items: array<int,int>,
     *      cents: int,
     *      currency: non-empty-string,
     *      tx: non-empty-string,
     *      createdAt: string
     *  }>
     */
    public function getAll(): array;
}
