<?php

namespace App\Services;

use App\Http\Controllers\Misc\TaskController;
use App\Interfaces\NotificationSender;

class SlackSender implements NotificationSender
{
    public function send(TaskController $task): void
    {
    }
}
