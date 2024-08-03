<?php

namespace Modules\JiraBoard\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Topup\Providers\TopUpRouteServiceProvider;

class JiraBoardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app()->register(JiraBoardRouteServiceProvider::class);

        $this->mergeConfigFrom(__DIR__. "/../config/config.php", 'Jira');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'Jira');

        $this->loadMigrationsFrom(__DIR__ . "/../Database/migrations");
    }
}
