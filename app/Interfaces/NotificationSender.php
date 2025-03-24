<?php

namespace App\Interfaces;


use App\Http\Controllers\Misc\TaskController;

interface NotificationSender
{
    public function send(TaskController $task): void;
}
