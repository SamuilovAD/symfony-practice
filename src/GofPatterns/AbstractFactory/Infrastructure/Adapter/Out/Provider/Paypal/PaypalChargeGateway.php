<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider\Paypal;

use App\GofPatterns\AbstractFactory\Application\Port\Out\ChargeGatewayInterface;

final class PaypalChargeGateway implements ChargeGatewayInterface
{
    public function charge(string $orderId, int $amountCents, string $currency): string
    {
        // ... $this->sdk->paymentIntents->create([...])
        return 'paypal_123'; // id
    }
}
