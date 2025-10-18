<?php

namespace App\GofPatterns\AbstractFactory\Application\Port\Out;

interface ChargeGatewayInterface
{
    public function charge(string $orderId, int $amountCents, string $currency): string;
}
