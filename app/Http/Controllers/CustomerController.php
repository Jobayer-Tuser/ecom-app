<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(): View|Factory|Application
    {
        $customers = User::query()->where('role_id', Role::USER->value)->get();
        return view('', compact('customers'));
    }
}
