<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function index(PermissionService $permissionService): View|Factory|Application
    {
        $permissions = $permissionService->getPermissions();
        return view('admin.permission.index', compact('permissions'));
    }

    public function store(Request $request, PermissionService $permissionService): RedirectResponse
    {
        $permissionService->storePermissions($request->only('name', 'slug'));
        return to_route('permission.index', 'Permission created successfully.');
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return to_route('permission.index', 'Permission deleted successfully.');
    }
}
