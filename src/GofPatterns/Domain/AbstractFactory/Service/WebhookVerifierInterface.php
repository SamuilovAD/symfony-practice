<?php

declare(strict_types=1);

namespace App\GofPatterns\Domain\AbstractFactory\Service;

interface WebhookVerifierInterface
{
    public function verify(string $payload, string $signatureHeader): bool;
}
