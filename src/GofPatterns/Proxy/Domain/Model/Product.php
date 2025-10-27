<?php

declare(strict_types=1);

namespace App\GofPatterns\Proxy\Domain\Model;

final readonly class Product
{
    public function __construct(
        public int $id,
        public string $name,
        public int $priceCents,
    ) {
    }
}
