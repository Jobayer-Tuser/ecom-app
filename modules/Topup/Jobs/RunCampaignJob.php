<?php

namespace Modules\Topup\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Topup\Http\Controllers\CampaignProcessController;
use Modules\Topup\Models\CampaignProcess;
use Modules\Topup\Models\ResponseLog;

class RunCampaignJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $params, public string $bearerToken)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $campaignProcessor = new CampaignProcessController();

        $requestTime = date("Y-m-d H:i:s");
        $returnResponse = $campaignProcessor->sendBalanceToReceiver($this->params, $this->bearerToken);
        $responseTime = date("Y-m-d H:i:s");

        if($returnResponse->data->message == "Successful"){
            $contactNumber = $returnResponse->data->topupData->msisdn;
            CampaignProcess::query()
                ->where("contact_number", $contactNumber)
                ->update(["process_status" => "Completed"] );
        }

        $data = [
            "transaction_id"    => $returnResponse->data->trans_id,
            "status"            => $returnResponse->data->status,
            "request_time"      => $requestTime,
            "response_time"     => $responseTime,
            "request_params"    => $this->params,
            "response"          => $returnResponse,
        ];
        ResponseLog::query()->create($data);
    }
}
