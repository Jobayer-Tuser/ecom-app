<?php

namespace Modules\Topup\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Modules\JiraBoard\Http\Controllers\Controller;
use Modules\Topup\Jobs\RunCampaignJob;
use Modules\Topup\Models\Campaign;
use Modules\Topup\Models\CampaignProcess;

class CampaignProcessController extends Controller
{
    public function updateCampaignStatus(): void
    {
        $campaign = Campaign::query()->select("campaign_lot_id")
            ->where("schedule_time", "<=" , Carbon::now()->format("Y-m-d H:i:s"))
            ->first();

        if ($campaign){
            CampaignProcess::query()
                ->where("process_status", "Processing")
                ->where("campaign_lot_id", $campaign->campaign_lot_id)
                ->update(["process_status" => "Pending"]);
        }
    }

    public function runCampaignInQueue(): void
    {
        $securityToken = DB::table("token")->select("security_token")->first();
        $campaign = CampaignProcess::query()
            ->select("contact_number", "contact_operator", "contact_type", "balance", "transaction_id")
            ->where("process_status", "Pending")
            ->limit(10)->get();

        foreach ($campaign as $eachCampaign) {
            $params = $this->prepareParam($eachCampaign);
            $bearerToken = $this->prepareBearerToken($params, $securityToken->security_token);
            $this->sendBalanceToReceiver($params, $bearerToken);
//            RunCampaignJob::dispatch($params, $bearerToken);
        }
    }

    public function prepareParam($requestData): array
    {
        return [
            "username" => env("CLIENT_USERNAME"),
            "password" => env("CLIENT_PASSWORD"),
            "ref_id" => $requestData["transaction_id"],
            "msisdn" => $requestData["contact_number"],
            "amount" => $requestData["balance"],
            "con_type" => strtolower($requestData["contact_type"]),
            "operator" => $requestData["contact_operator"],
        ];
    }

    public function prepareBearerToken(array $requestData, string $securityToken): string
    {
        $apiKey = env("API_KEY");
        $encryptionKey = env("ENCRYPTION_KEY");
        $hashedData = hash_hmac("sha256", json_encode($requestData), $encryptionKey);
        return $bearerToken = base64_encode($securityToken . ":" . $apiKey . ":" . $hashedData);
    }

    public function sendBalanceToReceiver($requestParam, string $bearerToken)
    {
        $response = Http::withHeaders([
            "Authorization" => "Bearer " . $bearerToken,
            "Content-Type" => "application/json",
        ])->post(env("RECHARGE_URL"), $requestParam);
        return json_decode($response);
    }

    public function checkPayWellBalance()
    {
        $apiCredentials = [
            "username" => env("CLIENT_USERNAME"),
            "password" => env("CLIENT_PASSWORD"),
        ];
        $securityToken = DB::table("token")->select("security_token")->first();
        $bearerToken = $this->prepareBearerToken($apiCredentials, $securityToken->security_token);

        $response = Http::withHeaders([
            "Authorization" => "Bearer " . $bearerToken,
            "Content-Type" => "application/json",
        ])->post(env("CHECK_BALANCE"), $apiCredentials);

        return json_decode($response);
    }

    public function generatePayWellToken(): void
    {
        $response = Http::withHeaders([
            "Authorization" => "Basic " . base64_encode(env("API_USERNAME") . ":" . env("API_PASSWORD"))
        ])->post(env("AUTHENTICATION_URL"), [
            "APIUserName" => env("API_USERNAME"),
            "APIPassword" => env("API_PASSWORD"),
        ]);

        $response = json_decode($response);

        DB::table("token")->update([
            "security_token" => $response->token->security_token,
            "token_type" => $response->token->token_type,
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
    }
}
