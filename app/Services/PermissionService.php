<?php

namespace App\Services;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class PermissionService
{
    public function getPermissions(): Collection
    {
        return Permission::query()->get(['id','name', 'slug']);
    }
}
