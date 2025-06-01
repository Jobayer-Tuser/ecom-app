<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function getRoles() : Collection
    {
        return Role::query()
            ->with('permissions:id,name,slug')
            ->get(['id','name', 'slug']);
    }

    public function createRole(array $role, array $permissions) : void
    {
        $role = Role::query()->create($role);
        $role->permissions()->sync($permissions);
    }

    public function updateRole(Role $role, array $permissions) : void
    {
        $role->update((array)$role);
        $role->permissions()->sync($permissions);
    }

    public function deleteRole(Role $role) : void
    {
        $role->users()->detach();
        $role->permissions()->detach();
        $role->delete();
    }
}
