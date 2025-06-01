<?php

namespace App\Solid\LiskovSubstitution;

use Illuminate\Support\Facades\Http;

class Github implements UserFetchApi
{
    public function fetch(): array
    {
        $user = Http::get('https://jsonfakery.com/users/random');

        return [
            'email'     => $user['email'],
            'name'      => $user['first_name'] . ' ' . $user['last_name'],
            'role'      => $user['role'],
        ];
    }
}
