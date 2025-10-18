<?php

declare(strict_types=1);

namespace App\GofPatterns\Decorator\Infrastructure\Decorator;

use App\GofPatterns\Decorator\Domain\Model\Product;
use App\GofPatterns\Decorator\Domain\Port\ProductRepository;
use App\GofPatterns\Decorator\Infrastructure\Cache\InMemory\TimedCache;

final class CachedProductRepository implements ProductRepository
{
    public function __construct(
        private readonly ProductRepository $inner,
        private readonly TimedCache $cache,
    ) {
    }

    /**
     * @param int[] $ids
     *
     * @return array<int,Product>
     */
    public function findByIds(array $ids): array
    {
        if ([] === $ids) {
            return [];
        }

        $normIds = array_values(array_unique(array_map('intval', $ids)));
        sort($normIds);
        $cacheKey = 'products-'.implode('-', $normIds);
        /** @var array<int,Product>|null $cached */
        $cached = $this->cache->get($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }
        $result = $this->inner->findByIds($normIds);
        $this->cache->set($cacheKey, $result);

        return $result;
    }
}
