<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Application\UseCase\PlaceOrder;

final readonly class PlaceOrderRequest
{
    /** @param array<int,int> $items map productId => qty */
    public function __construct(
        public int $userId,
        public array $items,
        public int $totalAmountCents,
        public string $currency = 'USD',
    ) {
    }
}
