<?php

namespace Modules\Product\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\ProductVariant;

class ProductVariantService
{
    public function getVariants(): Collection|array
    {
        return ProductVariant::query()->with('product')->get()->except(['created_at', 'updated_at']);
    }
}
