<?php

declare(strict_types=1);

namespace App\GofPatterns\Domain\AbstractFactory\Service;

interface RefundServiceInterface
{
    public function refund(string $paymentId, int $amountCents): string;
}
