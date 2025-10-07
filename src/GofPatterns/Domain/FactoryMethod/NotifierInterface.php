<?php
declare(strict_types=1);

namespace App\GofPatterns\Domain\FactoryMethod;

interface NotifierInterface
{
    public function send(string $message): void;
}
