<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider\Stripe;

use App\GofPatterns\AbstractFactory\Application\Port\Out\WebhookVerifierInterface;

final class StripeWebhookVerifier implements WebhookVerifierInterface
{
    public function verify(string $payload, string $signatureHeader): bool
    {
        /* signature check */
        return true;
    }
}
