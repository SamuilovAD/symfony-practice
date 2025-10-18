<?php

namespace App\GofPatterns\AbstractFactory\Application\Port\Out;

interface WebhookVerifierInterface
{
    public function verify(string $payload, string $signatureHeader): bool;
}
