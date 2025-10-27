<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Infrastructure\Persistence;

use App\GofPatterns\Facade\Domain\Port\OrderRepositoryInterface;

final class InMemoryOrderRepository implements OrderRepositoryInterface
{
    private int $autoIncrement = 1;

    /**
     * @var array<int, array{
     *      userId: int,
     *      items: array<int,int>,
     *      cents: int,
     *      currency: non-empty-string,
     *      tx: non-empty-string,
     *      createdAt: string
     *  }>
     */
    private array $orders = [];

    public function save(
        int $userId,
        array $items,
        int $totalAmountCents,
        string $currency,
        string $transactionId,
    ): int {
        $id = $this->autoIncrement++;
        $this->orders[$id] = [
            'userId' => $userId,
            'items' => $items,
            'cents' => $totalAmountCents,
            'currency' => $currency,
            'tx' => $transactionId,
            'createdAt' => date('c'),
        ];

        return $id;
    }

    public function getAll(): array
    {
        return $this->orders;
    }
}
