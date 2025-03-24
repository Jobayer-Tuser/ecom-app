<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     * @param int $i
     */
    public function __construct(public readonly int $i)
    {
        //public object $requestData
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "Sending email to class ". $this->i;
        echo "Mail sent to ". $this->i;
    }
}
