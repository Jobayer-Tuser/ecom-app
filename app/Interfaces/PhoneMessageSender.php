<?php

namespace App\Interfaces;

use App\Http\Controllers\TaskController;
use App\Models\User;

class PhoneMessageSender implements NotificationSender
{
    public function send(TaskController $task): void
    {
        // TODO: Implement send() method.
    }
}
