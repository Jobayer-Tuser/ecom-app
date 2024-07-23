<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private readonly RoleService $service)
    {

    }
    public function index()
    {
        $roles = $this->service->getRoles();
        return view('admin.role.index', compact('roles'));
    }
}
