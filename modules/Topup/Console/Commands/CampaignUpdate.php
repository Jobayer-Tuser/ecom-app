<?php

namespace Modules\Topup\Console\Commands;

use Illuminate\Console\Command;
use Modules\Topup\Http\Controllers\CampaignProcessController;

class CampaignUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:campaign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to update campaign';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $campaign = new CampaignProcessController();
        $campaign->updateCampaignStatus();
    }
}
