<?php

namespace App\GofPatterns\Domain\FactoryMethod;

interface NotifierFactoryInterface
{
    public function create(NotifierTypeEnum $type): NotifierInterface;
}
