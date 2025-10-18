<?php

namespace App\GofPatterns\Builder\Application\Port\Out;

interface StripeUrlBuilderFactoryInterface
{
    public function create(): StripeUrlBuilderInterface;
}
