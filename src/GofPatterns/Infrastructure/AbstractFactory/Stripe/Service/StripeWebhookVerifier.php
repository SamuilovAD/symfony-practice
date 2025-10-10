<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Stripe\Service;

use App\GofPatterns\Domain\AbstractFactory\Service\WebhookVerifierInterface;

final class StripeWebhookVerifier implements WebhookVerifierInterface
{
    public function verify(string $payload, string $signatureHeader): bool
    {
        /* signature check */
        return true;
    }
}
