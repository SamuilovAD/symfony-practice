<?php

namespace App\GofPatterns\FactoryMethod\Domain\ValueObject;

enum NotifierTypeEnum: string
{
    case SMS = 'sms';
    case EMAIL = 'email';
}
