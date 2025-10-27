<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Infrastructure\Adapter\Out\Payment;

use App\GofPatterns\Facade\Domain\Port\PaymentGatewayInterface;

final class FakePaymentGateway implements PaymentGatewayInterface
{
    public function __construct(private readonly bool $shouldFail = false)
    {
    }

    public function charge(int $amountCents, string $currency): string
    {
        if ($this->shouldFail) {
            throw new \RuntimeException('Payment declined by fake gateway');
        }

        $prefix = 'tx_';
        $rand = bin2hex(random_bytes(4));

        return $prefix.$rand.'_'.$amountCents.$currency;
    }
}
