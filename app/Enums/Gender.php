<?php

namespace App\Enums;

enum Gender : string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public function gender() : string
    {
        return match ($this) {
            self::MALE   => 'male',
            self::FEMALE => 'female',
        };
    }
}
