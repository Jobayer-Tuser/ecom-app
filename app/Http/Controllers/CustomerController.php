<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Modules\JiraBoard\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $customers = User::query()->where('role_id', Role::USER->value)->get();
        return view('');
    }
}
