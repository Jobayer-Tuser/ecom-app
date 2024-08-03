<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\JiraBoard\Http\Services\DailyTaskService;
use Exception;

class UpdateDailyTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:dailytask';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all JIRA task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $task = new DailyTaskService();
        try {
            $task->updateAllDailyTask();
            $task->deleteCompleteTask();
        } catch ( Exception $error ){
            echo $error->getMessage();
        }
    }
}
