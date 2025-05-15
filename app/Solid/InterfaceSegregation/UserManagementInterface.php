<?php

namespace App\Solid\InterfaceSegregation;

interface UserManagementInterface
{
    public function fetchUserById(int $id);
    public function fetchAllUsers();
}
