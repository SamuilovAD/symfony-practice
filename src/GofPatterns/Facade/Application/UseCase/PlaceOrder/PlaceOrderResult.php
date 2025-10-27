<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Application\UseCase\PlaceOrder;

final readonly class PlaceOrderResult
{
    public function __construct(
        public bool $success,
        public ?int $orderId = null,
        public ?string $transactionId = null,
        public ?string $message = null,
    ) {
    }
}
