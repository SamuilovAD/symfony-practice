<?php

namespace App\GofPatterns\AbstractFactory\Application\UseCase;

final readonly class ChargePaymentResult
{
    public function __construct(
        public string $paymentId,
        public string $status = 'charged',
    ) {
    }
}
