<?php

declare(strict_types=1);

namespace App\GofPatterns\Domain\AbstractFactory\Factory;

use App\GofPatterns\Domain\AbstractFactory\Service\ChargeServiceInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\RefundServiceInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\WebhookVerifierInterface;

interface PaymentProviderFactoryInterface
{
    public function createCharge(): ChargeServiceInterface;

    public function createRefund(): RefundServiceInterface;

    public function createWebhookVerifier(): WebhookVerifierInterface;
}
