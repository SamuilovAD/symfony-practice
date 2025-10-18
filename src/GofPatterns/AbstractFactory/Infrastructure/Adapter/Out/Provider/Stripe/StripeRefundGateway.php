<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider\Stripe;

use App\GofPatterns\AbstractFactory\Application\Port\Out\RefundGatewayInterface;

final class StripeRefundGateway implements RefundGatewayInterface
{
    public function refund(string $paymentId, int $amountCents): string
    {
        return 're_456';
    }
}
