<?php

namespace Modules\Topup\Console\Commands;

use Illuminate\Console\Command;
use Modules\Topup\Http\Controllers\CampaignProcessController;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan Command to generate token';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $campaignProcess = new CampaignProcessController();
        $campaignProcess->generatePayWellToken();
    }
}
