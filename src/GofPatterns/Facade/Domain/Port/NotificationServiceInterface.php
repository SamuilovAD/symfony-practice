<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Domain\Port;

interface NotificationServiceInterface
{
    public function notify(int $userId, string $message): void;
}
