<?php

use Illuminate\Support\Facades\Route;
use Modules\Topup\Http\Controllers\CampaignController;

Route::get("/campaign", [CampaignController::class, "runCampaignInQueue"]);
Route::get("/update-campaign", [CampaignController::class, "updateCampaignStatus"]);
Route::get("/generate-token", [CampaignController::class, "generatePayWellToken"]);
Route::get("/check-balance", [CampaignController::class, "checkPayWellBalance"]);
