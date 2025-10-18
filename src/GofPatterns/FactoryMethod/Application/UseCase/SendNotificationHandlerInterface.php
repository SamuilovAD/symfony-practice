<?php

namespace App\GofPatterns\FactoryMethod\Application\UseCase;

interface SendNotificationHandlerInterface
{
    public function __invoke(SendNotificationInput $in): SendNotificationResult;
}
