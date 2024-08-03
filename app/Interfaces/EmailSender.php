<?php

namespace App\Interfaces;

use Modules\JiraBoard\Http\Controllers\TaskController;
use Modules\JiraBoard\Models\User;

class EmailSender implements NotificationSender
{
    public function send(TaskController $task): void
    {
        // TODO: Implement send() method.
    }
}
