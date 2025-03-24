<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
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
    public function __construct(
        private readonly RoleService $roleService,
    ){}

    public function index(): View|Factory|Application
    {
        $roles = $this->roleService->getRoles();
        $users = $this->roleService->getUsers();
        return view('admin.role.index', compact('roles', 'users'));
    }

    public function assignRole(Request $request): RedirectResponse
    {
        $user = User::query()->find($request->user_id);
        $role = Role::query()->find($request->role_id);
        $user->roles()->sync($role);

        return Redirect::back();
    }
}
