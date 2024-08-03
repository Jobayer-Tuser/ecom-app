<?php

namespace App\Interfaces;

use Modules\JiraBoard\Http\Controllers\TaskController;
use Modules\JiraBoard\Models\User;

interface NotificationSender
{
    public function send(TaskController $task): void;
}
