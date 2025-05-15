<?php

namespace App\Solid\InterfaceSegregation;

interface UserPermissionManagementInterface
{
    public function grantPermission(int $user_id, string $permission);
    public function revokePermission(int $user_id, string $permission);
}
