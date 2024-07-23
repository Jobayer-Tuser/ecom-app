<?php

namespace App\Interfaces;

use App\Http\Controllers\TaskController;

class SlackSender implements NotificationSender
{
    public function send(TaskController $task): void
    {
        // TODO: Implement send() method.
    }
}
