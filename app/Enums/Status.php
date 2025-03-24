<?php

namespace App\Enums;

enum Status : int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function toString() : string
    {
        return match ($this){
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
        };
    }

    public function colour(): string
    {
        return match ($this){
            self::ACTIVE => 'success',
            self::INACTIVE => 'secondary',
        };
    }
}
