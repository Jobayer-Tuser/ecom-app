<?php

namespace Modules\Topup\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class TopUpRouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot() : void
    {
        $this->routes(function (){
            Route::middleware('web')
                ->group(__DIR__. '/../routes/web.php');
        });
    }
}
