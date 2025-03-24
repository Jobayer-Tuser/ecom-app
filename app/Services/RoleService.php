<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function getRoles() : Collection
    {
        return Role::query()->get(['id','name']);
    }

    public function getUsers() : Collection
    {
        return User::with('roles')->get(['id','name']);
    }
}
