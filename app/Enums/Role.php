<?php

namespace App\Enums;

enum Role : int
{
    case ADMIN  = 1;
    case VENDOR = 2;
    case USER   = 3;

    public function role() : string
    {
        return match ($this){
            self::ADMIN   => 'admin',
            self::VENDOR  => 'vendor',
            self::USER    => 'user',
        };
    }
}
