<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Domain\Service;

interface NotifierInterface
{
    public function send(string $message): void;
}
