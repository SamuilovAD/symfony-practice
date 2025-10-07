<?php
declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\FactoryMethod;

use App\GofPatterns\Domain\FactoryMethod\NotifierInterface;

class SmsNotifier implements NotifierInterface
{
    public function send(string $message): void
    {
        echo "Sending SMS: $message\n";
    }
}
