<?php

declare(strict_types=1);

namespace App\GofPatterns\Decorator\Domain\Port;

use App\GofPatterns\Decorator\Domain\Model\Product;

/**
 * @return array<int,Product>
 */
interface ProductRepository
{
    /**
     * @param int[] $ids
     *
     * @return array<int,Product>
     */
    public function findByIds(array $ids): array;
}
