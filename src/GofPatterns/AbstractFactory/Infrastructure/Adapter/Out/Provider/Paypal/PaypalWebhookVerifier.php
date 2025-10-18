<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider\Paypal;

use App\GofPatterns\AbstractFactory\Application\Port\Out\WebhookVerifierInterface;

final class PaypalWebhookVerifier implements WebhookVerifierInterface
{
    public function verify(string $payload, string $signatureHeader): bool
    {
        /* signature check */
        return true;
    }
}
