<?php

namespace App\GofPatterns\Infrastructure\Builder;

use App\GofPatterns\Domain\Builder\StripeUrlBuilderFactoryInterface;
use App\GofPatterns\Domain\Builder\UrlBuilderInterface;

final class StripeUrlBuilderFactory implements StripeUrlBuilderFactoryInterface
{
    public static function create(): UrlBuilderInterface
    {
        return new StripeUrlBuilder();
    }
}
