<?php

declare(strict_types=1);

namespace App\GofPatterns\Prototype\Domain\Model;

final class NotificationPrototype
{
    public function __construct(
        public string $title,
        public string $message,
        public string $channel = 'email',
    ) {
    }

    public function __clone()
    {
        $this->title .= ' (copy)';
    }

    public function display(): string
    {
        return sprintf(
            'Notification [%s] via %s: %s',
            $this->title,
            $this->channel,
            $this->message
        );
    }
}
