<?php

namespace App\Solid\LiskovSubstitution;

use Illuminate\Http\JsonResponse;

class UserDataController
{
    public function show(): JsonResponse
    {
        // Example in laravel of Liskov Substitution: Mail, Database class or like any Payment Gateway
        // Subclass is completely interchangeable
        $twitter = new Twitter();
        $user = $twitter->fetch();

        return response()->json($user);
    }
}
