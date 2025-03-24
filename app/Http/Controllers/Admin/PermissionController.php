<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PermissionService;
use Illuminate\Foundation\Application;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function __construct(private readonly PermissionService $permissionService){}
    public function index(): View|Factory|Application
    {
        $permissions = $this->permissionService->getPermissions();
        return view('admin.permission.index', compact('permissions'));
    }
}
