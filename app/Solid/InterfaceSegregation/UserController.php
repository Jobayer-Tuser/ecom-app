<?php

namespace App\Solid\InterfaceSegregation;

class UserController
{
    public function __construct(UserManagementInterface $userManagement, UserPermissionManagementInterface $userPermissionManagement)
    {
        // interface segregation mean interface should be segregated to the specific use case, not containing all methods
    }
}
