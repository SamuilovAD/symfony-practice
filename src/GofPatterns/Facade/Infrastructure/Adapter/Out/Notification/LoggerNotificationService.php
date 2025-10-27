<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Infrastructure\Adapter\Out\Notification;

use App\GofPatterns\Facade\Domain\Port\NotificationServiceInterface;

final class LoggerNotificationService implements NotificationServiceInterface
{
    public function __construct(private readonly string $filePath)
    {
    }

    public function notify(int $userId, string $message): void
    {
        $line = sprintf('[%s] Notify user %d: %s', date('c'), $userId, $message).PHP_EOL;
        @file_put_contents($this->filePath, $line, FILE_APPEND);
    }
}
