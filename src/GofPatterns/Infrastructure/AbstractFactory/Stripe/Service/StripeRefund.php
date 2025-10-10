<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Stripe\Service;

use App\GofPatterns\Domain\AbstractFactory\Service\RefundServiceInterface;

final class StripeRefund implements RefundServiceInterface
{
    public function refund(string $paymentId, int $amountCents): string
    {
        return 're_456';
    }
}
