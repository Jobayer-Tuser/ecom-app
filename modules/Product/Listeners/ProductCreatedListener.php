<?php

namespace Modules\Product\Listeners;

use Modules\Product\Events\ProductCreatedEvent;

class ProductCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreatedEvent $event): void
    {
        $event->product->name;
    }
}
