<?php

namespace App\Services;

use App\Http\Controllers\Misc\TaskController;
use App\Interfaces\NotificationSender;

class EmailSender implements NotificationSender
{
    public function send(TaskController $task): void
    {
        // TODO: Implement send() method.
    }
}
