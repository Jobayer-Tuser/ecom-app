<?php

namespace App\Enums;

 enum Role : string
{
    case USER   = 'user';
    case ADMIN  = 'admin';
    case MANAGER = 'vendor';
    case CUSTOMER = 'customer';

    public function toRoleId() : int
    {
        return match ($this) {
            self::USER     => 1,
            self::ADMIN    => 2,
            self::MANAGER  => 3,
            self::CUSTOMER => 4,
        };
    }
}
