<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Application\UseCase;

use App\GofPatterns\AbstractFactory\Domain\ValueObject\ProviderEnum;

final class ChargePaymentInput
{
    public function __construct(
        public readonly ProviderEnum $provider,
        public readonly string $orderId,
        public readonly int $amountCents,
        public readonly string $currency,
    ) {
    }
}
