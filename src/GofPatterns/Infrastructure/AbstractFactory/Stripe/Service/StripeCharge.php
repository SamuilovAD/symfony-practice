<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Stripe\Service;

use App\GofPatterns\Domain\AbstractFactory\Service\ChargeServiceInterface;

final class StripeCharge implements ChargeServiceInterface
{
    public function charge(string $orderId, int $amountCents, string $currency): string
    {
        // ... $this->sdk->paymentIntents->create([...])
        return 'stripe_123'; // id
    }
}
