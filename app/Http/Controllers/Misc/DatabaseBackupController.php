<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use Exception;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Hash;

class DatabaseBackupController extends Controller
{
    public function __invoke(Request $request): void
    {
        $user = $request->user();
        $request->validate([
            'password' => [
                'required',
                function ($attribute, $value, $fail) use ($user){
                    if (!Hash::check($value, $user->password)){
                        $fail('Current password is incorrect.');
                    }
                }
            ]
        ]);
    }

    /**
     * @throws \Throwable
     */
    public function jobChainingExample(Request $request): void
    {
        $jobs = [
            new SendEmailJob('Hello'),
            new SendEmailJob('World'),
        ];
         Bus::chain($jobs)
            ->onQueue('video')
            ->catch(function (Exception $exception) {
                echo $exception->getMessage();
            })
            ->dispatch();
        # command: php artisan queue:work --queue=video,default --timeout=0 --tries=0 --sleep=0 --stop-when-empty --stop-on-failure --delay=0

        $batch = Bus::batch([
            new SendEmailJob('Hello'),
        ])->dispatch();

        $batch = Bus::batch([
            new SendEmailJob('Hello'),
            new SendEmailJob('Hello'),
            new SendEmailJob('Hello'),
            new SendEmailJob('Hello'),
        ])
            ->then(function (Batch $batch) {
                echo $batch->id;
            })
            ->catch(function (Exception $exception, Batch $batch) {
                echo "Failed batch id - ". $batch->id;
            })
            ->finally(function (Batch $batch) {
                echo "We have completed process - ". $batch->id;
            })
            ->dispatch();

        Bus::findBatch($batch->id);
    }

}
