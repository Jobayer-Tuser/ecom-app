<?php

namespace App\Listeners;

use App\Events\ProcessDBBackup;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessDBBackupListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProcessDBBackup $event): void
    {
        //
    }
}
