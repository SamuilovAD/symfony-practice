<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Paypal\Service;

use App\GofPatterns\Domain\AbstractFactory\Service\ChargeServiceInterface;

final class PaypalCharge implements ChargeServiceInterface
{
    public function charge(string $orderId, int $amountCents, string $currency): string
    {
        // ... $this->sdk->paymentIntents->create([...])
        return 'paypal_123'; // id
    }
}
