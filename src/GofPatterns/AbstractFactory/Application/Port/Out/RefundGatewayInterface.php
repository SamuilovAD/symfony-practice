<?php

namespace App\GofPatterns\AbstractFactory\Application\Port\Out;

interface RefundGatewayInterface
{
    public function refund(string $paymentId, int $amountCents): string;
}
