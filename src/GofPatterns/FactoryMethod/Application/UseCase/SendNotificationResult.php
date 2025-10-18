<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Application\UseCase;

final readonly class SendNotificationResult
{
    public function __construct(
        public string $channel,
        public string $status,
    ) {
    }
}
