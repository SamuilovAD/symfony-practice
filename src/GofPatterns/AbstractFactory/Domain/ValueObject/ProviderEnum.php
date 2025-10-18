<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Domain\ValueObject;

enum ProviderEnum: string
{
    case STRIPE = 'stripe';
    case PAYPAL = 'paypal';
}
