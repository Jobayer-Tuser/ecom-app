<?php

namespace App\Services;

use Modules\JiraBoard\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function getRoles() : Collection
    {
        return Role::query()->get(['id','name']);
    }
}
