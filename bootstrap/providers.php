<?php

use Modules\Product\Providers\EventServiceProvider;
use Modules\Product\Providers\TopupServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\TelescopeServiceProvider::class,
    EventServiceProvider::class,
    TopupServiceProvider::class,
];
