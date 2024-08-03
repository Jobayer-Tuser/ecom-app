<?php

namespace Modules\Topup\Providers;

use Illuminate\Support\ServiceProvider;

class TopUpServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        app()->register(TopUpRouteServiceProvider::class);

        $this->mergeConfigFrom(__DIR__. "/../config/config.php", 'top');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'top');

        $this->loadMigrationsFrom(__DIR__ . "/../Database/migrations");
    }
}
