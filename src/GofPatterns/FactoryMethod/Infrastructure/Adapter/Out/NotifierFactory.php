<?php

declare(strict_types=1);

namespace App\GofPatterns\FactoryMethod\Infrastructure\Adapter\Out;

use App\GofPatterns\FactoryMethod\Domain\Service\NotifierFactoryInterface;
use App\GofPatterns\FactoryMethod\Domain\Service\NotifierInterface;
use App\GofPatterns\FactoryMethod\Domain\ValueObject\NotifierTypeEnum;
use App\GofPatterns\FactoryMethod\Infrastructure\Adapter\Out\Email\EmailNotifier;
use App\GofPatterns\FactoryMethod\Infrastructure\Adapter\Out\Sms\SmsNotifier;

class NotifierFactory implements NotifierFactoryInterface
{
    public function create(NotifierTypeEnum $type): NotifierInterface
    {
        return match ($type) {
            NotifierTypeEnum::EMAIL => new EmailNotifier(),
            NotifierTypeEnum::SMS => new SmsNotifier(),
        };
    }
}
