<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Application\UseCase;

final readonly class SendNotificationInput
{
    public function __construct(
        public string $type,
        public string $message,
    ) {
    }
}
