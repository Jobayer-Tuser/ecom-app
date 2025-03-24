<?php

namespace App\Enums;

use App\Interfaces\NotificationSender;
use App\Services\EmailSender;
use App\Services\PhoneMessageSender;
use App\Services\SlackSender;

enum Priority : string
{
    case LOW = 'low';
    case HIGH = 'high';
    case NORMAL = 'normal';

    public function notificationSender() : NotificationSender
    {
        return match ($this){
          self::LOW     => new EmailSender(),
          self::NORMAL  => new SlackSender(),
          self::HIGH    => new PhoneMessageSender(),
        };
    }
}
