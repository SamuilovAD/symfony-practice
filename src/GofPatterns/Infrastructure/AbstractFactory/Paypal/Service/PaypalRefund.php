<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Paypal\Service;

use App\GofPatterns\Domain\AbstractFactory\Service\RefundServiceInterface;

final class PaypalRefund implements RefundServiceInterface
{
    public function refund(string $paymentId, int $amountCents): string
    {
        return 're_456';
    }
}
