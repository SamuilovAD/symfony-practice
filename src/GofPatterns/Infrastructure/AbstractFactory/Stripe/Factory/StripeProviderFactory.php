<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Stripe\Factory;

use App\GofPatterns\Domain\AbstractFactory\Factory\PaymentProviderFactoryInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\ChargeServiceInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\RefundServiceInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\WebhookVerifierInterface;
use App\GofPatterns\Infrastructure\AbstractFactory\Stripe\Service\StripeCharge;
use App\GofPatterns\Infrastructure\AbstractFactory\Stripe\Service\StripeRefund;
use App\GofPatterns\Infrastructure\AbstractFactory\Stripe\Service\StripeWebhookVerifier;

class StripeProviderFactory implements PaymentProviderFactoryInterface
{
    public function createCharge(): ChargeServiceInterface
    {
        return new StripeCharge();
    }

    public function createRefund(): RefundServiceInterface
    {
        return new StripeRefund();
    }

    public function createWebhookVerifier(): WebhookVerifierInterface
    {
        return new StripeWebhookVerifier();
    }
}
