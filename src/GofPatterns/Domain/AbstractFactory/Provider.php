<?php

declare(strict_types=1);

namespace App\GofPatterns\Domain\AbstractFactory;

enum Provider: string
{
    case STRIPE = 'stripe';
    case PAYPAL = 'paypal';
}
