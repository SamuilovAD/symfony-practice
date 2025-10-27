<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Domain\Port;

interface PaymentGatewayInterface
{
    /**
     * Charges the given amount and returns transaction id on success.
     * Should throw an exception on failure.
     */
    public function charge(int $amountCents, string $currency): string;
}
