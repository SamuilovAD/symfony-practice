<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Paypal\Service;

use App\GofPatterns\Domain\AbstractFactory\Service\WebhookVerifierInterface;

final class PaypalWebhookVerifier implements WebhookVerifierInterface
{
    public function verify(string $payload, string $signatureHeader): bool
    {
        /* signature check */
        return true;
    }
}
