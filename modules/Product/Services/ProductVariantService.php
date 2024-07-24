<?php

namespace Modules\Product\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\ProductVariant;

class ProductVariantService
{
    public function getVariants(): Collection|array
    {
        return ProductVariant::query()->with('product')->get()->except(['created_at', 'updated_at']);
    }

    public function storeVariants(array $request): Model|Builder
    {
        return ProductVariant::query()->create($request);
    }

    public function updateProductVariants(array $request, ProductVariant $productVariant): bool
    {
        return $productVariant->update($request);
    }
}
