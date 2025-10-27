<?php

declare(strict_types=1);

namespace App\GofPatterns\Proxy\Domain\Port;

use App\GofPatterns\Proxy\Domain\Model\Product;

interface ProductCatalogInterface
{
    public function hydrate(int $id): Product;
}
