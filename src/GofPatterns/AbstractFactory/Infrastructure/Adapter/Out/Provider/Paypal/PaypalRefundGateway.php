<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider\Paypal;

use App\GofPatterns\AbstractFactory\Application\Port\Out\RefundGatewayInterface;

final class PaypalRefundGateway implements RefundGatewayInterface
{
    public function refund(string $paymentId, int $amountCents): string
    {
        return 're_456';
    }
}
