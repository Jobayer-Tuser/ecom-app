<?php

namespace App\Interfaces;

use Modules\JiraBoard\Http\Controllers\TaskController;

class SlackSender implements NotificationSender
{
    public function send(TaskController $task): void
    {
        // TODO: Implement send() method.
    }
}
