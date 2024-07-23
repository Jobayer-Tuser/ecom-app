<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Jobs\SendEmailJob;
use App\Mail\SendVerificationEmail;
use DateTime;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserCreatedListener implements ShouldQueue
{
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public int $tries = 3;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public int $maxExceptions = 3;

    /**
     * Handle the event.
     */
    public function handle(UserCreatedEvent $event): void
    {
        # Command : php artisan queue:work --stop-when-empty
//        Mail::send(new SendVerificationEmail($event->user));
    }

    public function failed()
    {
        //if the Queue failed then what to do

    }

    /**
     * Determine number of times the job may be attempted.
     */
    public function tries(): int
    {
        // retry logic can be input
        return 5;
    }

    /**
     * Determine the time at which the job should timeout.
     */
    public function retryUntil(): DateTime
    {
        return now()->addMinutes(10);
    }
}
