<?php

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

if (!function_exists('authUser')) {
    function authUser(): Authenticatable|User
    {
        return auth()->user();
    }
}
