<?php

namespace Modules\Product\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\Product\Events\ProductCreatedEvent;
use Modules\Product\Listeners\ProductCreatedListener;

class ProductServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        app()->register(RouteServiceProvider::class);

        $this->mergeConfigFrom(__DIR__. "/../config/config.php", 'product');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'product');
        $this->loadMigrationsFrom(__DIR__ . "/../Database/migrations");

        Event::listen(events: ProductCreatedEvent::class, listener: [ProductCreatedListener::class]);

    }
}
