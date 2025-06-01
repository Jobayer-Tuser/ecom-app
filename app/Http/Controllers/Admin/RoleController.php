<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Responses\RoleCreateAndEditResponse;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function index(RoleService $roleService, PermissionService $permissionService): RoleCreateAndEditResponse
    {
        return new RoleCreateAndEditResponse('index', $permissionService, $roleService);
    }

    public function store(Request $request, RoleService $roleService): RedirectResponse
    {
        $roleService->createRole(role: $request->only('name'), permissions: $request->permissions);
        return to_route('role.index', 'Role created successfully.');
    }

    public function edit(Role $role, PermissionService $permissionService): RoleCreateAndEditResponse
    {
        return new RoleCreateAndEditResponse( view: 'edit', permissionService: $permissionService, role: $role);
    }

    public function update(Role $role, Request $request, RoleService $roleService): RedirectResponse
    {
        $roleService->updateRole(role: $role, permissions: $request->permissions);
        return Redirect::route('role.index', 'Role updated successfully.');
    }

    public function destroy(Role $role, RoleService $roleService): RedirectResponse
    {
        $roleService->deleteRole($role);
        return Redirect::route('role.index', 'Role deleted successfully.');
    }
}
