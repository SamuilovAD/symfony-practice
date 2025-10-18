<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Infrastructure\Adapter\Out\Email;

use App\GofPatterns\FactoryMethod\Domain\Service\NotifierInterface;

class EmailNotifier implements NotifierInterface
{
    public function send(string $message): void
    {
        echo "Sending EMAIL: $message\n";
    }
}
