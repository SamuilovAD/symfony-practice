<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Infrastructure\Adapter\Out\Sms;

use App\GofPatterns\FactoryMethod\Domain\Service\NotifierInterface;

class SmsNotifier implements NotifierInterface
{
    public function send(string $message): void
    {
        echo "Sending SMS: $message\n";
    }
}
