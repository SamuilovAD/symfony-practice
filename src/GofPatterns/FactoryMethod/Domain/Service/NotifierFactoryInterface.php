<?php

namespace App\GofPatterns\FactoryMethod\Domain\Service;

use App\GofPatterns\FactoryMethod\Domain\ValueObject\NotifierTypeEnum;

interface NotifierFactoryInterface
{
    public function create(NotifierTypeEnum $type): NotifierInterface;
}
