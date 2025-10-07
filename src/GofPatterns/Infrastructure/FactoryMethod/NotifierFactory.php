<?php
declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\FactoryMethod;

use App\GofPatterns\Domain\FactoryMethod\NotifierFactoryInterface;
use App\GofPatterns\Domain\FactoryMethod\NotifierInterface;
use App\GofPatterns\Domain\FactoryMethod\NotifierTypeEnum;

class NotifierFactory implements NotifierFactoryInterface
{
    public function create(NotifierTypeEnum $type): NotifierInterface
    {
        return match($type) {
            NotifierTypeEnum::EMAIL => new EmailNotifier(),
            NotifierTypeEnum::SMS => new SmsNotifier(),
        };
    }
}
