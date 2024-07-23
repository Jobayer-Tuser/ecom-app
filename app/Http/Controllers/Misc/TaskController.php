<?php

namespace App\Http\Controllers;

use App\Enums\Priority;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(public readonly string $name, public readonly string $description, public readonly Priority $priority){}
}

$task = new TaskController(name: 'Send Email', description: 'You have to work on 3 issue', priority: Priority::HIGH);
$task->priority->notificationSender()->send($task);
