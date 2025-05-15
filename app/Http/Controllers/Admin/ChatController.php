<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class ChatController extends Controller
{
    public function index()
    {
        return view('admin.chat.index');
    }
}
