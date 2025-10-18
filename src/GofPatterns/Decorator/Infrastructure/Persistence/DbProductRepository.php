<?php

declare(strict_types=1);

namespace App\GofPatterns\Decorator\Infrastructure\Persistence;

use App\GofPatterns\Decorator\Domain\Model\Product;
use App\GofPatterns\Decorator\Domain\Port\ProductRepository;

final class DbProductRepository implements ProductRepository
{
    /**
     * @param int[] $ids
     *
     * @return array<int,Product>
     */
    public function findByIds(array $ids): array
    {
        $all = [
            1 => new Product(1, 'Keyboard', 4999),
            2 => new Product(2, 'Mouse', 2999),
            3 => new Product(3, 'Monitor', 12999),
        ];

        $out = [];
        foreach ($ids as $id) {
            if (isset($all[$id])) {
                $out[$id] = $all[$id];
            }
        }

        return $out;
    }
}
