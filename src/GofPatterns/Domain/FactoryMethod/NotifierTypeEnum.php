<?php

namespace App\GofPatterns\Domain\FactoryMethod;

enum NotifierTypeEnum: string
{
     case SMS = 'sms';
     case EMAIL = 'email';
}
