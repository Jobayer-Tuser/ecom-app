<?php

namespace App\Interfaces;

use App\Http\Controllers\TaskController;
use App\Models\User;

interface NotificationSender
{
    public function send(TaskController $task): void;
}
