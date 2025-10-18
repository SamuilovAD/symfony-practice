<?php

namespace App\GofPatterns\Builder\Interface\Adapter\Out;

use App\GofPatterns\Builder\Application\Port\Out\StripeUrlBuilderFactoryInterface;
use App\GofPatterns\Builder\Application\Port\Out\StripeUrlBuilderInterface;

final class StripeUrlBuilderFactory implements StripeUrlBuilderFactoryInterface
{
    public function create(): StripeUrlBuilderInterface
    {
        return new StripeStripeUrlBuilder();
    }
}
