<?php

namespace App\Enums;

use App\Interfaces\EmailSender;
use App\Interfaces\NotificationSender;
use App\Interfaces\PhoneMessageSender;
use App\Interfaces\SlackSender;

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
