<?php

use Modules\Product\Providers\ProductEventServiceProvider;
use Modules\Product\Providers\ProductServiceProvider;
use Modules\Topup\Providers\TopUpServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\TelescopeServiceProvider::class,
    ProductServiceProvider::class,
    ProductEventServiceProvider::class,
    TopUpServiceProvider::class,
];
