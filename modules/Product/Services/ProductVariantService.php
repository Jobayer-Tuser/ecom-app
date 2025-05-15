<?php

namespace Modules\Product\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\ProductVariant;

class ProductVariantService
{
    public function getVariants(): Collection|array
    {
        return ProductVariant::query()->with('product')->get()->except(['created_at', 'updated_at']);
    }

    public function storeProductVariants(array $requestVariants, int $productId) : void
    {
        foreach ($requestVariants['variant'] as $variant) {
            ProductVariant::query()->create([
                'product_id'    => $productId,
                'variant_name'  => $variant['name'],
                'variant_value' => $variant['value'],
            ]);
        }
    }

    public function updateProductVariants(array $request, ProductVariant $productVariant): bool
    {
        return $productVariant->update($request);
    }
}
