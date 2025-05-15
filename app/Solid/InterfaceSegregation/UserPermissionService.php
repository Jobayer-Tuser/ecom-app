<?php

namespace App\Solid\InterfaceSegregation;

class UserPermissionService implements UserPermissionManagementInterface
{

    public function grantPermission(int $user_id, string $permission)
    {
        // TODO: Implement grantPermission() method.
    }

    public function revokePermission(int $user_id, string $permission)
    {
        // TODO: Implement revokePermission() method.
    }
}
