<?php

declare(strict_types=1);

namespace App\GofPatterns\Domain\AbstractFactory\Service;

interface ChargeServiceInterface
{
    public function charge(
        string $orderId,
        int $amountCents,
        string $currency,
    ): string;
}
