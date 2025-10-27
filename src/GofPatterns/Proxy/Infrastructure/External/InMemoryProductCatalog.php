<?php

declare(strict_types=1);

namespace App\GofPatterns\Proxy\Infrastructure\External;

use App\GofPatterns\Proxy\Domain\Model\Product;
use App\GofPatterns\Proxy\Domain\Port\ProductCatalogInterface;
use App\GofPatterns\Proxy\Infrastructure\Cache\InMemoryCache;

final class InMemoryProductCatalog implements ProductCatalogInterface
{
    /** @var array<int,string> id => "Name|priceCents" */
    private array $rows = [
        1 => 'Coffee|1250',
        2 => 'Tea|790',
        3 => 'Cookie|325',
    ];

    public function __construct(private readonly InMemoryCache $cache)
    {
    }

    public function hydrate(int $id): Product
    {
        $cacheKey = 'product:'.$id;
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        if (!isset($this->rows[$id])) {
            throw new \RuntimeException("Product #$id not found");
        }

        [$name, $priceCents] = explode('|', $this->rows[$id]);
        $product = new Product($id, $name, (int) $priceCents);
        $this->cache->set($cacheKey, $product);

        // For demo visibility
        echo "[hydrate] Product #{$id} loaded\n";

        return $product;
    }
}
