<?php

declare(strict_types=1);

namespace App\GofPatterns\Proxy\Domain\Port;

interface ProductView
{
    public function getId(): int;

    public function getName(): string;

    public function getPriceCents(): int;
}
