<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Application\Port\Out\Factory;

use App\GofPatterns\AbstractFactory\Application\Port\Out\ChargeGatewayInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\RefundGatewayInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\WebhookVerifierInterface;

interface PaymentProviderFactoryInterface
{
    public function createCharge(): ChargeGatewayInterface;

    public function createRefund(): RefundGatewayInterface;

    public function createWebhookVerifier(): WebhookVerifierInterface;
}
