<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Application\UseCase;

use App\GofPatterns\FactoryMethod\Domain\Service\NotifierFactoryInterface;
use App\GofPatterns\FactoryMethod\Domain\ValueObject\NotifierTypeEnum;

final readonly class SendNotificationHandler implements SendNotificationHandlerInterface
{
    public function __construct(
        private NotifierFactoryInterface $factory,
    ) {
    }

    public function __invoke(SendNotificationInput $in): SendNotificationResult
    {
        $type = NotifierTypeEnum::from(strtolower($in->type));
        $notifier = $this->factory->create($type);
        $notifier->send($in->message);

        return new SendNotificationResult(channel: $type->value, status: 'sent');
    }
}
